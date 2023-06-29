
@foreach($contacts as $contact)

    <input type="checkbox" data-id="{{ $contact->id }}" name="status" class="js-switch" {{ $contact->status == 1 ? 'checked' : '' }}>

@endforeach
<script>

    $(function() {

      $('.toggle-class').change(function() {

          var status = $(this).prop('checked') == true ? 1 : 0;

          var id = $(this).data('id');



          $.ajax({

              type: "GET",

              dataType: "json",

              url: '{{ route('admin.change.status') }}',

              data: {'status': status, 'id': id},

              success: function(data){

                console.log(data.success)

              }

          });

      })

    })

  </script>
