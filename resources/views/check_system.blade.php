
<div>Laravel version:  {{ App::VERSION() }}</div>
<div>PHP version: @php echo phpversion(); @endphp</div>
<div>SQL version:
@php $results = DB::select( DB::raw('SHOW VARIABLES LIKE "%version%"') );

$results = DB::select( DB::raw("select version()") );
echo $mysql_version =  $results[0]->{'version()'};
$mariadb_version = '';

if (strpos($mysql_version, 'Maria') !== false) {
    $mariadb_version = $mysql_version;
    $mysql_version = '';
}

@endphp
</div>
