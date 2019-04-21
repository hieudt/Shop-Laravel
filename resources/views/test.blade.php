<link href="https://larvuejs.vn/assets/css/bootstrap.min.css" rel="stylesheet">

@forelse ($danhmuc as $item)
    {{$item->title}}
@empty
    
@endforelse