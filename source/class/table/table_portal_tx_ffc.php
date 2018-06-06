<?php 

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_portal_tx_ffc extends discuz_table
{
    public function __construct() {

        $this->_table = 'portal_tx_ffc';
        $this->_pk    = 'id';

        parent::__construct();
    }

    public function fetch_all($status, $orderby = 1) {
        //return $this->count();
        return DB::fetch_all('SELECT * FROM '.DB::table($this->_table));
    }

    public function order_by_id($id, $orderby = 1) {
        $id = $id ? 1 : 0;
        $ordersql = $orderby ? 'ORDER BY date' : '';
        return DB::fetch_all('SELECT * FROM '.DB::table($this->_table)." $ordersql");
    }

    public function fetch_all_by_displayorder($type = '')
    {
        $args = array($this->_table);
        if($type) {
            $sql = 'WHERE (`type` & %s > 0)';
            $args[] = $type;
        }
        return DB::fetch_all("SELECT * FROM %t $sql ORDER BY displayorder", $args, $this->_pk);
    }
    
    public function fetch_all_by_sql($where, $order = '', $start = 0, $limit = 0, $count = 0, $alias = '') {
        $where = $where && !is_array($where) ? " WHERE $where" : '';
        if(is_array($order)) {
            $order = '';
        }
        if($count) {
            return DB::result_first('SELECT count(*) FROM '.DB::table($this->_table).'  %i %i %i '.DB::limit($start, $limit), array($alias, $where, $order));
        }
        return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' %i %i %i '.DB::limit($start, $limit), array($alias, $where, $order));
    }

}



 ?>