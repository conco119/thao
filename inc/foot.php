  <!-- jQuery -->
    <script src="./js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
    <script>
        var gois = <?=json_encode($goirule);?>;
        $(function(){
            $('[name="goi"]').change(function(){
                var goi = $(this).val();
                data = '';
               $(gois[goi]).each(function(a) {
                   var tengoi = gois[goi][a].split("sv")[1];
                   data+= '<option value="'+gois[goi][a]+'">Sever '+tengoi+'</option>';
                });

                $('[name="sever"]').html(data);
            })
        })
        function getInfo(id)
        {
          $.post("./v1.php?mc=vip&site=getInfoVip", {'id' : id}).done(function(data) {
              data = JSON.parse(data);
              console.log(data);
              var types = JSON.parse(data.type)
              console.log(types);
              if (data.id)
              {
                  select = '';
                  $("#UpdateForm input[name=id]").val(data.id);
                  $("#UpdateForm input[name=name]").val(data.name);
                  $("#UpdateForm input[name=speed]").val(data.speed);
                  $(gois[data.goi]).each(function(index, value) {
                    select += `<option value='${value}'`;
                    if(value == data.sever)
                      select += `selected>${value} </option>`;
                    else
                      select += `>${value} </option>`;
                    $("#UpdateForm select[name=server]").html(select);
                  });
                  for(type of types)
                  {
                    switch(type)
                    {
                      case "LIKE":
                        $("#UpdateForm input[value=LIKE]").attr("checked", "checked");
                        break;
                      case "HAHA":
                        $("#UpdateForm input[value=HAHA]").attr("checked", "checked");
                        break;
                      case "WOW":
                        $("#UpdateForm input[value=WOW]").attr("checked", "checked");
                        break;
                      case "ANGRY":
                        $("#UpdateForm input[value=ANGRY]").attr("checked", "checked");
                        break;
                      case "LOVE":
                        $("#UpdateForm input[value=LOVE]").attr("checked", "checked");
                        break;
                      case "SAD":
                        $("#UpdateForm input[value=SAD]").attr("checked", "checked");
                        break;
                      default:
                        console.log("NOPE");
                        break;
                    }
                  }
                  // $("#UpdateForm input[name=status]").attr("checked", "checked");
                  // $("#UpdateForm input[name=status]").prop('checked', true);
                  // $("#title").html('Thêm khách hàng');
              }

          });
        }
    </script>
</body>
</html>
