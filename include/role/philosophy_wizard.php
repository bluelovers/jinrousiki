<?php
/*
  ◆賢者 (philosophy_wizard)
  ○仕様
  ・魔法：河童・錬金術師・蛇姫・火車・土蜘蛛・釣瓶落とし・弁財天
*/
RoleManager::LoadFile('wizard');
class Role_philosophy_wizard extends Role_wizard{
  public $action = NULL;
  public $wizard_list = array(
    'alchemy_pharmacist', 'cure_pharmacist', 'miasma_jealousy', 'miasma_mad', 'critical_mad',
    'sweet_cupid', 'corpse_courier_mad');
  public $result_list = array('PHARMACIST_RESULT');
  function __construct(){ parent::__construct(); }
}
