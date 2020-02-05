@extends('layouts.app')

@section('content')


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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

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
@endsection
