<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   {{-- <link src="{{ mix('css/app.css') }}"></link> --}}
   <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   {{-- <style>
      {!! Vite::content('css/app.css') !!}
  </style> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <div id="app">
      <app></app>
   </div>
   
   {{-- <script>
      {!! Vite::content('js/app.js') !!}
  </script> --}}
  <script src="{{ mix('js/app.js') }}" defer></script>
   {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>