<?PHP

# service rabbitmq-server start
# service rabbitmq-server stop

$channels_list = [
  ["id"=>1497634727,"username"=>"navencigrupata"],
  ["id"=>1347496446,"username"=>"EvernymOfficial"],
  ["id"=>1134117557,"username"=>"electroneum"],
  ["username"=>"paretonetworkofficial"],
  ["username"=>"bancapublic"],
  ["username"=>"bankera"],
  ["username"=>"ParetoNetworkDutch"],
  ["username"=>"waxtokenannoucements"],
  ["username"=>"TestCompetitionGroupRu"],
  ["username"=>"iolite"],
  ["username"=>"EvernymOfficial"],
  ["username"=>"electroneum"],
  ["username"=>"navencigrupata"],
];

$phone = "+639365275149";
$session_key = "1BVtsOG4BuxeEGEruhzdAFwreaCa581vjk2DAmv0EUraUdIh9m72aiNfDgxiJxPg5sQdcetLsW-FcICt3nqurmWbybpp-ZXZRBAP8n5D4_UXzuJLVzHKWgaMurGoOG8O74pXirz42PKCs8V5dCICXIQRmHr4nZoZ5kR41Vlrh6fWlsNkTOwAB4qoDESxyTsgYN4h632h_dOOnwfLVXhyIK-sfA5RY-WZtB49LLVrK2NqMCF_ffc_O9IZ_24ey-iGhtFW7555q7M-fm3dqfi7jIiXZ274Cw2V9DyULA97NrIJqumnyh8Ta3xCwFMl9C2qZ8oZ7Gfze4AQJ4pU0oS2b_vWH2StepRA=";

# # #        # # #        # # #        # # #        # # #
# # #        # # #        # # #        # # #        # # #
# # #        # # #        # # #        # # #        # # #

$tg_channel_json = '{
    "id": 0,
    "url": null,
    "tg_channel_id": null,
    "tg_channel_username": null,
    "tg_channel_title": null,
    "members_count": null,
    "messages_count": null,
    "telegram_user_id": null,
    "is_banned": 0,
    "is_active": false,
    "created_at": "2018-08-09 13:02:59",
    "updated_at": "2018-08-09 13:02:59",
    "deleted_at": null
}';

$json = file_get_contents('config-base.json');
$data = json_decode($json);

$channels = [];
for ( $i=0; $i<sizeof($channels_list); $i++ )
{
  $c = (object)($channels_list[$i]);
  $o = json_decode($tg_channel_json);;
  $o->id = ++$i;
  if ( isset($c->username) )
  {
    $o->tg_channel_username = $c->username;
    $o->url = "https://t.me/$c->username";
  }
  if ( isset($c->id) )
    $o->tg_channel_id = $c->id;
  array_push( $channels, $o );
}

$data->telegram_user->phone = $phone;
$data->telegram_user->session_key = $session_key;
$data->telegram_channels = $channels;

// echo $json;
// var_dump($data);
echo json_encode($data);
