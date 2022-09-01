<!doctype html>
<html lang="en">
  <head>
    <title>Datatable Column Filter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <style>
        thead input {
           width: 100%;
        }
    </style>
  </head>
  <body>
    <div class="container=fluid p-3">
    <h4 class="text-center"> Employee Datatable Column Filter </h4>
        <table class="table table-bordered" id="mytable">
            <thead>
                
                <th> Name  </th>
                <th> Email </th>
                <th> Phone no. </th>
                <th> Address </th>            
                <th> Salary </th>
            </thead>
            <tbody>
                @foreach($stations as $employee)
                <tr>
                
                    <td>{{$employee->station_name}}</td>
                    <td>{{$employee->station_code}}</td>
                    <td>{{$employee->country}}</td>
                    <td>{{$employee->stationdate}}</td>
                    <td>{{$employee->stations}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script>
        $(document).ready(function() {
            $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
            $('#mytable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder=" Search '+title+'" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                });
            });

            var table = $('#mytable').DataTable( {
                orderCellsTop: true,
                fixedHeader: true
            });

            table.columns(1).search( "Lili" ).draw();
        });
    </script>
  </body>
</html>