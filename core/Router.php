<?php

namespace Core;

use Exception;

class Router
{
    private string $Path;
    private array $Parameters = [];
    private ?string $Controller = NULL;
    private ?string $Method = NULL;

    public function __construct()
    {
        // Mengambil URL request dan membersihkan dari subdirektori serta karakter ganda
        $RequestUri = str_replace(config('subdirectory'), '', $_SERVER['REQUEST_URI']);
        $RequestUri = str_replace('//', DIRECTORY_SEPARATOR, $RequestUri);
        $this->Path = parse_url($RequestUri, PHP_URL_PATH);
    }

    public function GetRoute()
    {
        // Memuat daftar rute dari file Routes.php
        $Routes = require __DIR__ . '/../Routes.php';
        foreach ($Routes as $Route):
            // Memvalidasi setiap rute untuk menemukan kecocokan dengan URL request
            if ($this->ValidateRoute($Route['url'])):
                // Jika rute cocok, simpan controller dan metode yang sesuai
                $this->Controller = $Route['controller'];
                $this->Method = $Route['method'];
                break;
            endif;
        endforeach;

        // Jika controller dan metode ditemukan, panggil metode tersebut dengan parameter
        if ($this->Controller && $this->Method):
            $Instance = new $this->Controller;
            $Method = $this->Method;
            $Instance->$Method(...$this->Parameters);
        else:
            // Jika tidak ditemukan, panggil fungsi abort() untuk mengirim error 404
            abort();
        endif;
    }

    private function ValidateRoute($RouteUrl): bool
    {
        // Membagi URL yang didefinisikan oleh programmer menjadi bagian-bagian
        $Uri = array_values(array_filter(explode('/', $RouteUrl)));

        // Membagi URL yang diminta oleh klien menjadi bagian-bagian
        $Url = array_values(array_filter(explode('/', $this->Path)));

        // Jika jumlah bagian URL tidak sama, rute tidak valid
        if (count($Uri) !== count($Url)):
            return false;
        endif;

        foreach ($Uri as $Key => $Params):
            // Jika URL memiliki parameter dalam format {*}, terima apa pun yang ada di dalamnya
            if (preg_match("/{(.*?)}/", $Params)):
                $Param = str_replace(['{', '}'], '', $Params);
                $this->Parameters[$Param] = $Url[$Key];
                continue;
            else:
                // Jika bagian URL tidak cocok, rute tidak valid
                if ($Params !== $Url[$Key]):
                    return false;
                endif;
            endif;
        endforeach;

        // Jika URL klien benar-benar ditemukan, rute valid
        return true;
    }

    /**
     * Mendapatkan URL rute berdasarkan nama rute
     * 
     * @throws Exception
     */
    public function GetRouteByName(string $RouteName, array $Data): string
    {
        // Memuat daftar rute dari file Routes.php
        $Routes = require __DIR__ . '/../Routes.php';
        $SearchRoute = array_search($RouteName, array_column($Routes, 'name'));
        if ($SearchRoute === false) {
            return $RouteName;
        } else {
            // Menyaring parameter dari URL rute yang ditemukan
            $ExtractUrlParams = array_values(array_filter(explode('/', $Routes[$SearchRoute]['url'])));

            foreach ($ExtractUrlParams as $Key => $Param):
                // Jika ada parameter dalam format {*}, ganti dengan data yang sesuai
                if (preg_match("/{(.*?)}/", $Param)):
                    $Variable = str_replace(['{', '}'], '', $Param);
                    if (in_array($Variable, array_keys($Data))):
                        $ExtractUrlParams[$Key] = $Data[$Variable];
                    else:
                        echo "<h2 style='direction: rtl;color:red;text-align:center'>value for {{$Variable}} in {{$RouteName}} Route is not defined.</h2>";
                        throw new Exception("value for {{$Variable}} in {{$RouteName}} Route is not defined");
                    endif;
                endif;
            endforeach;

            // Mengembalikan URL yang sudah diproses
            return implode('/', $ExtractUrlParams);
        }
    }
}
