<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <form action="{{-- {{ $routeDelete }} --}}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" {{-- name={{$name}} id={{$id}} --}}>
                    <p class="mb-0" id="textWarningDelete">Bạn có muốn xóa bản ghi này không</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    #deleteModalLabel {
        text-align: center;
        width: auto;
        margin: 0 auto;
    }

    #textWarningDelete {
        text-align: center;
    }
</style>
{{-- modal --}}