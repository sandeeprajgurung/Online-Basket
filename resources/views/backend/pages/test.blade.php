<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product Details</div>
                    @foreach ($data as $item)
                        
                   
                    <div class="card-body">
                         Product Name:  {{$item->name}} <br/><br/>
    
                         Product Description : {{$item->description}} <br/><br/>
    
    
                         Image: <img src="{{$item->getFirstMediaUrl('images')}}" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>