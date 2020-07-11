<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style type="text/css">
      div
      {
              background: blue;
              text-align: center;
              border: 1px solid black;
              padding: 10px;
              color: white;
      }
    </style>
  </head>
  <body>
<div class="row">
  <div class="col-sm-4">SM - 1</div>
  <div class="col-sm-4">SM - 2</div>
  <div class="col-sm-4">SM - 3</div>
</div>
<div class="row">
  <div class="col-md-4">MD - 1</div>
  <div class="col-md-4">MD - 2</div>
  <div class="col-md-4">MD - 3</div>
</div>

<!-- Or let Bootstrap automatically handle the layout -->
<div class="row">
  <div class="col text-right">COL - 1</div>
  <div class="col">COL - 2</div>
  <div class="col">COL - 3</div>
</div>
  </body>
</html>