<?php


namespace App\Models\Website;


use Illuminate\Database\Eloquent\Model;

class CmsSettings extends Model
{

    protected $table = 'cms_settings';
    public $timestamps = false;

    protected $fillable = ['key', 'value'];
    protected $primaryKey = 'key';
    protected $keyType = 'string';


    public static function checkSettings()
    {
        CmsSettings::firstOrCreate(['key' => 'hotel_name'], ['value' => 'LaraCMS']);
        CmsSettings::firstOrCreate(['key' => 'lara_cms_version'], ['value' => '2.0']);
        CmsSettings::firstOrCreate(['key' => 'register_motto'], ['value' => 'Welcome to LaraCMS Beta!']);
        CmsSettings::firstOrCreate(['key' => 'register_figure'], ['value' => 'lg-280-92.ha-1003-64.hd-180-1.ch-210-1419.hr-831-49.ea-1404-1408']);
        CmsSettings::firstOrCreate(['key' => 'starting_credits'], ['value' => '25000']);
        CmsSettings::firstOrCreate(['key' => 'starting_diamonds'], ['value' => '100']);
        CmsSettings::firstOrCreate(['key' => 'starting_duckets'], ['value' => '1000']);
        CmsSettings::firstOrCreate(['key' => 'client_connection_info_host'], ['value' => '127.0.0.1']);
        CmsSettings::firstOrCreate(['key' => 'client_connection_info_port'], ['value' => '3000']);
        CmsSettings::firstOrCreate(['key' => 'rcon_host'], ['value' => '127.0.0.1']);
        CmsSettings::firstOrCreate(['key' => 'rcon_port'], ['value' => '3001']);
        CmsSettings::firstOrCreate(['key' => 'client_logout_url'], ['value' => 'http://127.0.0.1/logout']);
        CmsSettings::firstOrCreate(['key' => 'client_external_texts_txt'], ['value' => 'http://127.0.0.1/swf/gamedata/texts.txt']);
        CmsSettings::firstOrCreate(['key' => 'client_external_variables_txt'], ['value' => 'http://127.0.0.1/swf/gamedata/variables.txt']);
        CmsSettings::firstOrCreate(['key' => 'client_external_override_texts_txt'], ['value' => 'http://127.0.0.1/swf/gamedata/override/texts.txt']);
        CmsSettings::firstOrCreate(['key' => 'client_external_override_variables_txt'], ['value' => 'http://127.0.0.1/swf/gamedata/override/variables.txt']);
        CmsSettings::firstOrCreate(['key' => 'client_productdata_load_url'], ['value' => 'http://127.0.0.1/swf/gamedata/productdata.txt']);
        CmsSettings::firstOrCreate(['key' => 'client_furnidata_load_url'], ['value' => 'http://127.0.0.1/swf/gamedata/furnidata.xml']);
        CmsSettings::firstOrCreate(['key' => 'client_external_figurepartlist_txt'], ['value' => 'http://127.0.0.1/swf/gamedata/figuredata.xml']);
        CmsSettings::firstOrCreate(['key' => 'client_flash_dynamic_avatar_download_configuration'], ['value' => 'http://127.0.0.1/swf/gamedata/figuremap.xml']);
        CmsSettings::firstOrCreate(['key' => 'client_flash_client_url'], ['value' => 'http://127.0.0.1/swf/other/game/']);
        CmsSettings::firstOrCreate(['key' => 'client_flash_client_url_swf'], ['value' => 'http://127.0.0.1/swf/other/game/habbo.swf']);
    }

    public static function roomIcon($online)
    {
        if ($online === 0) {
            return 'room_icon_1.gif';
        }
        if ($online < 5) {
            return 'room_icon_2.gif';
        }
        if ($online < 10) {
            return 'room_icon_3.gif';
        }
        if ($online < 20) {
            return 'room_icon_4.gif';
        }

        return 'room_icon_5.gif';
    }


}
