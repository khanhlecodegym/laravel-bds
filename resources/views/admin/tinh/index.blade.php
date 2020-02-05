<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        header {
            min-height: 100px;
            background: #143055;
        }

        body {
            margin: 0;
        }

        select {
            width: 10em;
        }
    </style>
</head>
<body>
    <header>

    </header>

    <div class="container">
        <section>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tên Tỉnh</th>
                    <th scope="col">Mã Tỉnh</th>
                    <th scope="col">Quận</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tinhs as $tinh)
                        <tr>
                        <td id="ten_tinh_{{ $tinh->id }}">{{ $tinh->ten_tinh }}</td>
                        <td id="ma_tinh_{{ $tinh->id }}">{{ $tinh->ma_tinh }} </td>
                        <td>
                            <select>
                                @foreach ($tinh->quans as $quan)
                                    <option>{{ $quan->ten_quan }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTinh" data-tinh_id="{{ $tinh->id }}">Edit</button>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            <ul>

            </ul>
        </section>
    </div>

    <div class="modal fade" id="editTinh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="ten-tinh" class="col-form-label">Tên Tỉnh:</label>
                  <input type="text" class="form-control" id="ten-tinh">
                </div>
                <div class="form-group">
                    <label for="ma-tinh" class="col-form-label">Mã Tỉnh:</label>
                    <input type="text" class="form-control" id="ma-tinh">
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>

      @include('partials.footer.footer')

      <script>
          $('#editTinh').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var tinh_id = button.data('tinh_id');
            var ten_tinh = $(`#ten_tinh_${tinh_id}`).html();
            var ma_tinh = $(`#ma_tinh_${tinh_id}`).html();

            var modal = $(this);
            modal.find('.modal-title').text('Edit ' + ten_tinh);
            modal.find('#ten-tinh').val(ten_tinh);
            modal.find('#ma-tinh').val(ma_tinh);
        })
      </script>
</body>
</html>
