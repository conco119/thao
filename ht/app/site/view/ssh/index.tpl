

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-body" >

                                <form method="POST" action='./?mc=ssh&site=buy'>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nhập số lượng muốn mua</label>
                                            <input type="number" name="num" placeholder="Số lượng" class="form-control" required="">
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
                                            <button type="submit" name='submit' class="btn btn-primary">Mua</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            <div class='row container'>
                <div class='col-md-2'>
                    <select class='form-control'>
                        {foreach from=$nations item=item }
                            <option value={$item.id}>{$item.name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" name='submit' class="btn btn-primary">Xuất file</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover projects">
                <thead>
                    <tr>
                        <th class="text-center">SSH</th>
                        <th class="text-center">Quốc gia</th>
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

function filter(id)
{

}
</script>

{/literal}
