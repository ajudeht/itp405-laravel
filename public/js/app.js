var ws = new WebSocket('ws://itp405-ws-docs.herokuapp.com/api/ws');

let textStore = "";

let editTextArea = document.querySelector("#docs-test");
let editText = ()=>(editTextArea.innerText);
let id = uuid();

fetch('https://itp405-ws-docs.herokuapp.com/api/body')
.then( (res) => res.text() ).then((text)=>{
  textStore = text;
  editTextArea.innerText = textStore;
})


// function getEditDiff(text){
//   console.log(diff(editText(), text));
// }

editTextArea.addEventListener("input", (e)=>{
  let count = 0;
  let nd = diff(textStore, editText()).map((d, i)=>{
    let output;
    if (d[0] == 0){
      count += (d[1].length);
    } else if (d[0] == 1){
      output = { type: "add", position: count, char: d[1] }
      count = 0;
      return output;
    } else if (d[0] == -1){
      output = { type: "subtract", position: count, char: d[1] }
       count = 0;
       return output;
    }

  }).filter((e)=>(e!==null && e!==undefined));

  nd.forEach((r)=>ws.send(JSON.stringify(r)));

  console.log(nd);
})

editTextArea.addEventListener('keydown', (evt) => {
    if (evt.keyCode === 13) {
        evt.preventDefault();
        //disable line breaks
    }
});

// function handleEdit(e){
//   if (e.location == 0 && e.key.length == 1){
//     ws.send(JSON.stringify({ type: "add", char: e.key, position: getCaretPosition(), id: id }));
//   }
// }

ws.onmessage = function(event) {
  let lastCaret = getCaretPosition();
  let data = JSON.parse(event.data);
    console.log(lastCaret);
  if (data.id !== id){
    if (data.type=="add"){
    textStore = insertAt(textStore, data.char, data.position);
    editTextArea.innerText = textStore;
  } else if (data.type=="subtract"){
    let tsa = textStore.split("");
    tsa.splice(data.position, data.char.length).reverse();
    textStore = tsa.join("");
    editTextArea.innerText = textStore;
  }

    if (lastCaret !== -1){
      let sel =  window.getSelection();
      editTextArea.focus();
      sel.collapse(editTextArea.firstChild, lastCaret);
    }

  }

};

function getCaretPosition() {
  if (window.getSelection && window.getSelection().getRangeAt && editTextArea == document.activeElement) {
    var range = window.getSelection().getRangeAt(0) || 0;
    var selectedObj = window.getSelection();
    var rangeCount = 0;
    var childNodes = selectedObj.anchorNode.parentNode.childNodes;
    for (var i = 0; i < childNodes.length; i++) {
      if (childNodes[i] == selectedObj.anchorNode) {
        break;
      }
      if (childNodes[i].outerHTML)
        rangeCount += childNodes[i].outerHTML.length;
      else if (childNodes[i].nodeType == 3) {
        rangeCount += childNodes[i].textContent.length;
      }
    }
    return range.startOffset + rangeCount;
  }
  return -1;
}

function uuid(){
    var uuid = '', ii;
    for (ii = 0; ii < 32; ii += 1) {
      switch (ii) {
      case 8:
      case 20:
        uuid += '-';
        uuid += (Math.random() * 16 | 0).toString(16);
        break;
      case 12:
        uuid += '-';
        uuid += '4';
        break;
      case 16:
        uuid += '-';
        uuid += (Math.random() * 4 | 8).toString(16);
        break;
      default:
        uuid += (Math.random() * 16 | 0).toString(16);
      }
    }
    return uuid;
}

function createRange(node, chars, range) {
    if (!range) {
        range = document.createRange()
        range.selectNode(node);
        range.setStart(node, 0);
    }

    if (chars.count === 0) {
        range.setEnd(node, chars.count);
    } else if (node && chars.count >0) {
        if (node.nodeType === Node.TEXT_NODE) {
            if (node.textContent.length < chars.count) {
                chars.count -= node.textContent.length;
            } else {
                range.setEnd(node, chars.count);
                chars.count = 0;
            }
        } else {
           for (var lp = 0; lp < node.childNodes.length; lp++) {
                range = createRange(node.childNodes[lp], chars, range);

                if (chars.count === 0) {
                    break;
                }
            }
        }
    }

    return range;
};

let insertAt = (str, sub, pos) => `${str.slice(0, pos)}${sub}${str.slice(pos)}`;
