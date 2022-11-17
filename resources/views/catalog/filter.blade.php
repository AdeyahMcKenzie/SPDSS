<!DOCTYPE html>
<html>
    <head>
        <title>Display Items</title>
    </head>
    <body>
        @auth
        @foreach ($items as $item)
        <div>
            {{$item->name}}
        </div>
        @endforeach
        @endauth

        <a href='{{route("catalog.filterForm")}}'>Back</a>

    </body>   
</html>

  
                 
       
                   

         
