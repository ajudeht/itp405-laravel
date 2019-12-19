@extends('layouts.app')

@section('title', 'Tracks')

@section('level-right')
<?php
if (!empty($genre)) {
  echo '<div class="control" style="padding-right: 1em; border-right: 1px solid #d9d9d9; margin-right: 1em;">
    <div class="tags has-addons">
      <span class="tag is-medium is-rounded is-black">' . $genre . '</span>
      <a href="/tracks" class="tag is-medium is-rounded is-delete is-danger"></a>
    </div>
  </div>';
}
?>
 <a href="/tracks/new" class="button is-rounded is-success" style="font-size: .85em;">Add New Track</a>
@endsection

@section('content')
<div class="tags are-medium">
  <div class="table-container">
    <table class="table is-striped is-hoverable is-fullwidth">
      <tr>
        <th>Track</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Genre</th>
        <th>Price</th>
      </tr>

      <?php
        foreach ($tracks as &$track) {
            echo '<tr><td><b>' . $track->Name . '</b></td><td>' . $track->Artist . '</td><td>' . $track->Album . '</td><td><a href="/tracks?genre=' . $track->Genre . '" class="tag is-normal is-rounded is-black table-tag">' . $track->Genre. '</a><td><a class="tag is-normal is-success is-light table-tag">$' . $track->UnitPrice . '</a></div></td></td></tr>';
        }
      ?>
    </table>
  </div>
</div>
@endsection
