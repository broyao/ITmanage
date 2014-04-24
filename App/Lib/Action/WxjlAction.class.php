<?php
//维修记录
class WxjlAction extends Action {
    public function index(){
        if(IS_AJAX){
            $data = M('wxjl')->select();
            foreach($data as &$value){
                $value['clsj']=date('Y-m-d', $value['clsj']);
            }
            unset($value);
            echo json_encode($data);
        }
    }
    public function newRecord(){
        if(IS_AJAX){
            $nrec['bxr'] = $_POST['bxr'] ? trim(I('bxr','',htmlspecialchars)) : ''; 
            $nrec['gzqk'] = $_POST['gzqk'] ? trim(I('gzqk','',htmlspecialchars)) : ''; 
            $nrec['clr'] = $_POST['clr'] ? trim(I('clr','',htmlspecialchars)) : ''; 
            $nrec['clqk'] = $_POST['clqk'] ? trim(I('clqk','',htmlspecialchars)) : ''; 
            $nrec['clsj'] = $_POST['clsj'] ? trim(I('clsj','',htmlspecialchars)) : ''; 
            if(in_array('',$nrec)){
                echo '{"errorMsg":"表单请填写完整"}';
                return;
            }
            $clsj = explode('-',$nrec['clsj']);
            $nrec['clsj'] = mktime(0,0,0,$clsj[1],$clsj[2],$clsj[0]); 
            $nrec['wxbz'] = $_POST['wxbz'] ? trim(I('wxbz','',htmlspecialchars)) : ''; 
            if(!M('wxjl')->add($nrec)){
                echo '{"errorMsg":"数据库插入失败"}';
            }else{
                echo '插入成功';
            }
                
                
            
        
        
        
        }
            
                
    }
          
}
