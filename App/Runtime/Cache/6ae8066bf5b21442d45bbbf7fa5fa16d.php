<?php if (!defined('THINK_PATH')) exit();?><div> 
    <table id="wxjl_dg" class="easyui-datagrid" title="记录清单" 
            data-options="rownumbers:true,singleSelect:true,url:'<?php echo U('App/Wxjl/index');?>',method:'get',toolbar:'#wxjl_tb',pagination:true">
        <thead>
            <tr>
                <th data-options="field:'rid',width:60,align:'center'">维修编号</th>
                <th data-options="field:'bxr',width:80,align:'center'">报修人</th>
                <th data-options="field:'gzqk',width:200,align:'center'">故障情况</th>
                <th data-options="field:'clr',width:80,align:'center'">处理人</th>
                <th data-options="field:'clqk',width:200,align:'center'">处理情况</th>
                <th data-options="field:'clsj',width:80,align:'center'">处理时间</th>
                <th data-options="field:'wxbz',width:200,align:'center'">备注</th>
                
            </tr>
        </thead>
    </table>
    <div id="wxjl_tb" style="padding:3px;height:auto;">
        <div style="display:inline-block;">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newRecord()"></a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRecord()"></a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteRecord()"></a>
        </div>
        <div style="display:inline-block; float:right;">
            时间从 <input class="easyui-datebox" style="width:120px"/>
            到: <input class="easyui-datebox" style="width:120px"/>
           <input class="easyui-searchbox"  style="width:200px" />
           
    </div>
</div>

<div id="wxjl_dlg" class="easyui-dialog" style="width:400px;height:680px;padding:10px 20px" closed="true" buttons="#wxjl_dlg_buttons">
    <form id="wxjl_fm" method="get" >
        <br />
        <div>   
            <label for="bxr">报修人:</label>   
            <input  type="text" name="bxr"  />   
        </div> </br>
        <div>   
            <label for="gzqk">故障情况:</label></br>   
            <textarea   name="gzqk"  rows="5" cols="60"></textarea> 
        </div> </br>
        <div>   
            <label for="clr">处理人:</label>   
            <input  type="text" name="clr"  />   
        </div></br>
        <div>   
            <label for="clqk">处理情况:</label></br>  
            <textarea  name="clqk"  rows="5" cols="60"></textarea>  
        </div></br>
        <div>   
            <label for="clsj">处理时间:</label>   
            <input class="easyui-datebox" name="clsj"  style="width:120px">   
        </div> </br>
        <div>   
            <label for="wxbz">备注（可不填）:</label></br>  
            <textarea  name="wxbz" rows="5" cols="60"></textarea> 
        </div>  
    </form>
</div>

<div id="wxjl_dlg_buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRecord()">保存</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#wxjl_dlg').dialog('close')">退出</a>
</div>
	

<script>
                
		var url;
		function newRecord(){
			$('#wxjl_dlg').dialog('open').dialog('setTitle','添加记录');
			$('#wxjl_fm').form('clear');
			url="<?php echo U('App/Wxjl/newrecord');?>";
		}
        
		function editUser(){
			var row = $('#wxjl_dg').datagrid('getSelected');
			if (row){
				$('#wxjl_dlg').dialog('open').dialog('setTitle','Edit User');
				$('#wxjl_fm').form('load',row);
				url = 'update_user.php?id='+row.id;
			}
		}
        
  		function saveRecord(){
				$.ajax({
				   type: "POST",
				   url: url,
				   data:$('#wxjl_fm').serialize(),
				   dataType:"json",
				   success: function(data){
					   	if (data.errorMsg){
							alert(data.errorMsg);    
 						}else{
							$('#wxjl_dlg').dialog('close');	
							$('#wxjl_dg').datagrid('reload');
						}
				   }
				});
  		}

		function destroyUser(){
			var row = $('#wxjl_dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
					if (r){
						$.post('destroy_user.php',{id:row.id},function(result){
							if (result.success){
								$('#wxjl_dg').datagrid('reload');
							} else {
								$.messager.show({
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
</script>