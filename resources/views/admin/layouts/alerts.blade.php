@can("delete-user")
    <div class="modal fade target-modal-lg" tabindex="-1" id="delete-modal" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">حذف {{$target}}</h4>
                </div>
                <div class="modal-body">
                    <h4>ایا از حذف {{$target}} مورد نظر مطمعن هستید.</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                    <button type="button" data-dismiss="modal" id="button-delete" class="btn btn-danger">بله حذف کن
                    </button>
                </div>

            </div>
        </div>
    </div>



@endcan

@section("scripts")
    <script>
        $('#delete-modal').on('show.bs.modal', function (event) {
            let userId = event.relatedTarget.getAttribute("data-userId");
            let target = document.getElementById("button-delete");
            target.setAttribute("wire:click", `destroy(${userId})`)
        });
    </script>

    <script src="{{asset("/vendor/panel/js/pnotify.js")}}"></script>
    <script src="{{asset("/vendor/panel/js/pnotify.buttons.js")}}"></script>
    <script src="{{asset("/vendor/panel/js/pnotify.nonblock.js")}}"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alert', (event) => {
                new PNotify({
                    title: event.title,
                    text: event.message,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            });


        });

        function selectAll() {
            let checkAll = document.getElementById("selectAll");
            if (checkAll.checked) {
                Livewire.dispatch("select-page", {selected: true})
            } else {
                Livewire.dispatch("select-page", {selected: false})
            }
        }


    </script>
    @if(session("success"))
        <script>
            window.onload = function notifyAlert() {
                new PNotify({
                    title: 'انجام شد',
                    text: '{{session("success")}}',
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }
        </script>
    @endif
@endsection

@section("styles")
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/pnotify.css")}}">
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/pnotify.buttons.css")}}">
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/pnotify.nonblock.css")}}">
@endsection
