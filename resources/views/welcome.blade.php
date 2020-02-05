<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        header {
            min-height: 100px;
            background: #143055;
        }

        body {
            margin: 0;
        }

        .section1 {
            background: darkgray;
            margin-top: 2rem;
        }
    </style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <header>

    </header>

    <div class="container-fluid" style="">
        <section class="section1">
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select class="form-control" id="tinh">
                            <option value="">Tỉnh/Thành Phố</option>
                            @foreach ($tinhs as $item)
                                <option value="{{ $item->id }}">{{ $item->ten_tinh }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="quan">
                            <option value="">Quận/Huyện</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary">Xem kết quả</button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('partials.footer.footer')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
        jQuery(document).ready(function(){
           jQuery('#tinh').change(function(e){
              e.preventDefault();

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

              $.ajax({
                 url: "{{ url('/') }}",
                 method: 'get',
                 data: {
                    id: jQuery('#tinh').val()
                 },

                 success: function(result){
                    let data = result['data'];

                    let quansDom = jQuery('#quan');
                    let tinhs = '<option value="">Quận/Huyện</option>';
                    data.forEach(item => {
                        tinhs += `<option value='${item['id']}'>${item['ten_quan']}</option>`;
                    });

                    jQuery('#quan').html(tinhs);
                 }});
              });
           });
    </script>
</body>
</html>
