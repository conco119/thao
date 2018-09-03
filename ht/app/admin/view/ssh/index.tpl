<!-- Modal edit nation name -->
<div class="modal fade" id='ssh'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Chỉnh sửa</h4>
            </div>
            <div class="modal-body">
                <form action="./?mc=ssh&site=edit" method="post">
                    <label>SSH</label>
                    <input type='text' name='content' class='form-control'>
                    <input type='hidden' name='id'>
                    <br>
                    <label>Quốc gia</label>
                    <select class='form-control' id='nation' name='nation_id'>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                <button type="submit" class="btn btn-success">Chỉnh sửa</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="DeleteForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Xóa mục này</h4>
            </div>
            <div class="modal-body">Bạn chắc chắn muốn xóa mục này chứ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                <a class="btn btn-danger" id="DeleteItem">Xóa</a>
            </div>
        </div>
    </div>
</div>

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-body" >
                                <div>
                                    <a href='./quocgia' type="submit" name='submit' class="btn btn-primary">Quản lý quốc gia</a>
                                </div>
                                <form method="POST" action='./?mc=ssh&site=create'>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>SSH</label>
                                            <input type="text" name="content" placeholder="Nhập chuỗi" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Lựa chọn quốc gia</label>
                                            <select class='form-control' name='nation_id'>
                                                {foreach from=$nations item=item }
                                                    <option value={$item.id}>{$item.name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover projects">
                <thead>
                    <tr>
                        <th class="text-center">SSH</th>
                        <th class="text-center">Tên quốc gia</th>
                        <th class="text-center">Đã bán</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$ssh item=data}
                    <tr>
                        <td class="text-center">
                            {$data.content}
                        </td>
                        <td class="text-center">
                            {$data.name}
                        </td>
                        <td class="text-center">
                            {if $data.owned_by eq 0}
                                <span style='color:red'>
                                    <i class="fa fa-close"></i>
                                <span>
                            {else}
                                <span style='color:green'>
                                    <i class="fa fa-check"></i>
                                <span>
                            {/if}
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#ssh" onclick="LoadDataForForm({$data.id});"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteForm" onclick="Delete({$data.id});"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        <div>
            <div class="paging text-right">{$paging.paging}</div>
        </div>

    <!-- END MAIN CONTENT -->
</div>
{literal}
<script>
function Delete(id) {
    console.log(id)
    $("#DeleteItem").attr("href", "./?mc=ssh&site=delete&id=" + id);
}

function LoadDataForForm(id) {
    $.post("./?mc=ssh&site=ajax_load", { 'id': id }).done(function(data) {
        data = JSON.parse(data);
        $("#ssh input[name=id]").val(data.id);
        $("#ssh input[name=content]").val(data.content);
        $("#nation").html(data.str);
    });
}
</script>
{/literal}
