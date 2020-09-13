<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collator;

class SelectOptionsController extends Controller
{
    
    private $cities;
    private $townships;
    private $animals;
    private $catBreeds;
    private $dogBreeds;
    private $sex;
    private $size;
    private $furColor;
    private $furColor2;
    private $eyeColor;
    private $castratedOrSterialized;
    private $movedFromStreet;
    private $braceletColor;
    private $disability;
    public $selectData;

    public function __construct(){
         //defined here to have a clear view of all select values on the page
                //also shortened for faster search through database

//!!! NEVER CHANGE BY ADDING IN ASSOCIATIVE ARRAY DIRECTLY //
//!!! dogBreeds and catBreeds especially !!!//
//!!! items are stored in databases by the values of final array so just use array_push('new element in array')
//* dont mind if its at the bottom and not in an asc order 

$collator = new Collator('sr_Latn_RS');
                $this->cities = [
        
                    '1' => 'Beograd',	
                    '2' => 'Novi Sad',	
                    '3' => 'Niš',	
                    '4' => 'Kragujevac',	
                    '5' => 'Priština',	
                    '6' => 'Subotica',	
                    '7' => 'Zrenjanin',	
                    '8' => 'Pančevo',	
                    '9' => 'Čačak',	
                    '10' => 'Kruševac',	
                    '11' => 'Kraljevo',	
                    '12' => 'Novi Pazar',
                    '13' => 'Smederevo',	
                    '14' => 'Leskovac',	
                    '15' => 'Užice',	
                    '16' => 'Vranje',	
                    '17' => 'Valjevo',	
                    '18' => 'Šabac',	
                    '19' => 'Sombor',	
                    '20' => 'Požarevac',	
                    '21' => 'Pirot',	
                    '22' => 'Zaječar',	
                    '23' => 'Kikinda',	
                    '24' => 'Sremska Mitrovica',	
                    '25' => 'Jagodina',	
                    '26' => 'Vršac',	
                    '27' => 'Bor',	
                    '28' => 'Prokuplje',	
                    '29' => 'Loznica',
        ];
        $collator->sort($this->cities);
        $o=['0'=>'Ostali gradovi'];
        $this->cities = array_merge($this->cities,$o);
 //!!! NEVER CHANGE BY ADDING IN ASSOCIATIVE ARRAY DIRECTLY //
//!!! dogBreeds and catBreeds especially !!!//
//!!! items are stored in databases by the values of final array so just use array_push('new element in array')
//* dont mind if its at the bottom and not in an asc order                
        $this->townships = [
                    '1' => 'Čukarica',
                    '2' => 'Novi Beograd',
                    '3' => 'Palilula',
                    '4' => 'Rakovica',
                    '5' => 'Savski venac',
                    '6' => 'Stari grad',
                    '7' => 'Voždovac',
                    '8' => 'Vračar',
                    '9' => 'Zemun',
                    '10' => 'Zvezdara',
                    '11' => 'Barajevo',
                    '12' => 'Grocka',
                    '13' => 'Lazarevac',
                    '14' => 'Mladenovac',
                    '15' => 'Obrenovac',
                    '16' => 'Sopot',
                    '17' => 'Surčin',
        ];
        $collator->sort($this->townships, SORT_LOCALE_STRING);
//here you CAN add animal with the next int of a key               
        $this->animals = [
                    '1' => 'Pas',
                    '2' => 'Mačka',
                    '3' => 'Ptica',
                    '0' => 'Ostale životinje',
        ];

//!!! NEVER CHANGE BY ADDING IN ASSOCIATIVE ARRAY DIRECTLY //
//!!! dogBreeds and catBreeds especially !!!//
//!!! items are stored in databases by the values of final array so just use array_push('new element in array')
//* dont mind if its at the bottom and not in an asc order 
        $this->dogBreeds = [
            '125'=>' Brazilski terijer','17'=>' Džek raselov terijer','342'=>' Mali italijanski hrt','257'=>' Vajmarski ptičar','37'=>' Velški korgi kardigan','50'=>'Aireski ovčar','100'=>'Alentejski pastirski pas','142'=>'Aljaski malamut','249'=>'Alpski brak jazavičar','357'=>'Američka akita','373'=>'Američki buldog','301'=>'Američki koker španijel','198'=>'Američki lisičar','308'=>'Američki španijel za vodu','349'=>'Američki stafordski terijer','88'=>'Anadolski pastirski pas','106'=>'Apencelski pastirski pas','59'=>'Ardenski govedar','72'=>'Argentinski pas','206'=>'Arieški gonič','259'=>'Ariješki ptičar','238'=>'Artezijsko normanski baset','208'=>'Artoaški gonič','97'=>'Atlaski pastirski pas','53'=>'Australijski čuvar stada','57'=>'Australijski govedar','58'=>'Australijski kratkorepi pastirski ...','18'=>'Australijski ovčar','126'=>'Australijski terijer','66'=>'Austrijski kratkodlaki pinč','226'=>'Austrijski ravnodlaki gonič','334'=>'Avganistanski hrt','344'=>'Azavak','303'=>'Barbe','176'=>'Basenji','243'=>'Baset','247'=>'Bavarski planinski krvoslednik','113'=>'Bedlington terijer','314'=>'Belgijski grifon','19'=>'Belgijski ovčar Grenendal','370'=>'Belgijski ovčar Lakeoa','371'=>'Belgijski ovčar Malinoa','372'=>'Belgijski ovčar Terviren','54'=>'Beli švajcarski ovčar','38'=>'Bergamski pastirski pas','101'=>'Bernardinac','107'=>'Bernski pastirski pas','244'=>'Bigl','207'=>'Bigl zečar','185'=>'Bili','310'=>'Bišon - Havanski','311'=>'Bišon - Kovrdžavi','34'=>'Bobteil','312'=>'Bolonjski pas','31'=>'Border koli','114'=>'Border terijer','81'=>'Bordoška doga','222'=>'Bosanski oštrodlaki gonič - barak ...','25'=>'Boseron','333'=>'Bostonski terijer','30'=>'Bradati koli','73'=>'Brazilski pas','240'=>'Bretanjski riđi baset','26'=>'Briješki ovčar','315'=>'Briselski grifon','83'=>'Bul mastif','9'=>'Bul terijer','82'=>'Buldog','261'=>'Burbonski ptičar','258'=>'Burgoški jarebičar','162'=>'Čau-čau','281'=>'Češki fousek','136'=>'Češki terijer','20'=>'Češkoslovački vučiji pas','324'=>'Čivava','293'=>'Čizopik retriver','220'=>'Crnogorski planinski gonič','250'=>'Dalmatinski pas','128'=>'Dandi dinmont terijer','75'=>'Danski pas','359'=>'Dansko-švedski farmski pas','62'=>'Doberman','277'=>'Drentski ptičar','223'=>'Dunkerov gonič','296'=>'Engleski koker španijel','138'=>'Engleski patuljasti terijer','283'=>'Engleski poenter','284'=>'Engleski seter','299'=>'Engleski špringer španijel','108'=>'Entlebuški pastirski pas','273'=>'Epanjel breton','112'=>'Erdel terijer','202'=>'Erdeljski gonič','98'=>'Estrelski pastirski pas','163'=>'Eurasier','173'=>'Faraonski pas','232'=>'Finski gonič','153'=>'Finski špic','60'=>'Flandrijski govedar','115'=>'Foksterijer kratkodlaki','116'=>'Foksterijer oštrodlaki','331'=>'Francuski buldog','187'=>'Francuski buldog - crno beli','274'=>'Francuski epanjel','262'=>'Francuski ptičar gaskonjski tip ...','263'=>'Francuski ptičar pirinejski tip ...','186'=>'Francuski trobojni gonič','199'=>'Gonič rakuna','285'=>'Gordon seter','216'=>'Grčki gonič','338'=>'Grejhund','140'=>'Grenlandski pas','233'=>'Hamiltonov gonič','248'=>'Hanoverski krvoslednik','215'=>'Harijer','225'=>'Higenov gonič','166'=>'Hokaido','47'=>'Holandski kovrdžavi ovčar','45'=>'Holandski ovčar','70'=>'Holandski pinč','278'=>'Holandski prepeličar','224'=>'Holdenski gonič','90'=>'Hovavart','21'=>'Hrvatski ovčar','178'=>'Ibizki hrt','121'=>'Imalski terijer','286'=>'Irski crveni seter','287'=>'Irski crveno-beli seter','304'=>'Irski španijel za vodu','122'=>'Irski terijer','337'=>'Irski vučji hrt','154'=>'Islandski ovčar','227'=>'Istarski kratkodlaki gonič','200'=>'Istarski oštrodlaki gonič','148'=>'Istočno sibirska lajka','217'=>'Italijanski gonič - kratkodlaki ...','265'=>'Italijanski kratkodlaki ptičar ...','218'=>'Italijanski oštrodlaki gonič','280'=>'Italijanski spinon','161'=>'Italijanski volpino','172'=>'Izraelski ovčar','165'=>'Japanska Akita','87'=>'Japanski borac','330'=>'Japanski čin','169'=>'Japanski špic','135'=>'Japanski terijer','368'=>'Jazavičar','16'=>'Jazavičar kunićar','150'=>'Jemtlandski pas','139'=>'Jorkširski terijer','52'=>'Južnoruski ovčar','167'=>'Kai','177'=>'Kanarski hrt','80'=>'Kanarski pas','86'=>'Kane korso','152'=>'Karelijski gonič medveda','24'=>'Katalonski ovčar','325'=>'Kavalije king Čarls španijel','103'=>'Kavkaski ovčar','123'=>'Keri blu terijer','127'=>'Kern terijer','317'=>'Kineski ćubasti (kukmasti) pas ...','326'=>'King Čarls španijel','168'=>'Kišu','295'=>'Klamber španijel','40'=>'Komondor','164'=>'Korea jindo dog','279'=>'Korthalsov grifon','313'=>'Koton - tulearski pas','102'=>'Kraški ovčar','328'=>'Kromforlender','183'=>'Krvoslednik','41'=>'kvass','291'=>'Labrador retriver','305'=>'Lagoto romanjolo','92'=>'Landsir','159'=>'Laponski pastirski pas','156'=>'Laponski špic','158'=>'Laponski špic','320'=>'Lasa apso','117'=>'Lejklandski terijer','91'=>'Leonberger','196'=>'Lisičar gonič','65'=>'Majmunski pinč','79'=>'Majorški čuvar','23'=>'Majorški ovčar','316'=>'Mali brabanson','341'=>'Mali engleski hrt-vipet','205'=>'Mali englesko-francuski gonič','363'=>'Mali holandski pas za lov ptica ...','306'=>'Mali holandski pas za lov ptica ...','318'=>'Mali lavlji pas','269'=>'Mali minsterlender','242'=>'Mali oštrodlaki vendejski baset ...','210'=>'Mali plavi gaskonjski gonič','309'=>'Malteški pas','118'=>'Mančester terijer','39'=>'Maremano abruceški pastirski pas ...','84'=>'Mastif','267'=>'Mađarska vižla kratkodlaka','266'=>'Mađarska vižla oštrodlaka','343'=>'Mađarski hrt','124'=>'Mekodlaki pšenično žuti terijer ...','174'=>'Meksički golokoži pas','351'=>'Mešanac','369'=>'Minijaturni bul terijer','332'=>'Mops','85'=>'Napuljski mastif','77'=>'Nemačka doga','76'=>'Nemački bokser','271'=>'Nemački dugodlaki ptičar','236'=>'Nemački gonič','256'=>'Nemački kostretasti ptičar','253'=>'Nemački kratkodlaki ptičar','111'=>'Nemački lovački terijer','254'=>'Nemački oštrodlaki ptičar','22'=>'Nemački ovčar','294'=>'Nemački prepeličar','376'=>'Nemački špic - mali','377'=>'Nemački špic - patuljasti (pomeranac) ...','375'=>'Nemački špic - srednji/standardni ...','374'=>'Nemački špic - veliki','160'=>'Nemački špic - vučji','214'=>'Nivernejski oštrodlaki gonič','89'=>'Njufaundlandski pas','151'=>'Norbotenski špic','129'=>'Norfolški terijer','145'=>'Norveški crni gonič','146'=>'Norveški lovački špic','144'=>'Norveški sivi gonič','155'=>'Norveški špic','130'=>'Norvički terijer','260'=>'Overnejski ptičar','119'=>'Parson raselov terijer','99'=>'Pastirski pas iz Laboreira','367'=>'Patuljasti jazavičar','327'=>'Patuljasti kontinentalni epanjel ...','64'=>'Patuljasti pinč','69'=>'Patuljasti šnaucer','329'=>'Pekinezer','345'=>'Persijski hrt - saluki','335'=>'Persijski hrt-saluki','175'=>'Peruanski inka pas','275'=>'Pikardijski epanjel','27'=>'Pikardijski ovčar','63'=>'Pinč','94'=>'Pirinejski mastif','28'=>'Pirinejski ovčar duge dlake','29'=>'Pirinejski ovčar duge dlake','95'=>'Pirinejski planinski pas','212'=>'Plavi oštrodlaki gaskonjski gonič ...','272'=>'Plavi pikardijski epanjel','184'=>'Poatuški gonič','49'=>'Podhalanski ovčar','229'=>'Poljski gonič','346'=>'Poljski hrt','360'=>'Poljski pas za lov','48'=>'Poljski ravničarski ovčar','297'=>'Poljski španijel','276'=>'Pont-odmerški epanjel','209'=>'Porculanski gonič','268'=>'Portugalski jarebičar','307'=>'Portugalski pas za vodu','61'=>'Portugalski pastirski pas sa St. ...','203'=>'Posavski gonič','355'=>'Pudla - mala','365'=>'Pudla - patuljasta','366'=>'Pudla - srednja','354'=>'Pudla - velika ','319'=>'Pudla patuljasta - toy','255'=>'Pudlpoenter','43'=>'Puli','42'=>'Pulin - Mudi','44'=>'Pumi','290'=>'Ravnodlaki retriver','289'=>'Retriver kovrdžave dlake','213'=>'Riđi oštrodlaki bretanjski gonič ...','251'=>'Rodezijski ridžbek','78'=>'Rotvajler','55'=>'Rumunski karpatski ovčarski pas ...','56'=>'Rumunski mioritski ovčar','71'=>'Ruski crni terijer','336'=>'Ruski hrt - barzoj','361'=>'Ruski patuljasti pas','147'=>'Rusko evropska lajka','141'=>'Samojed','74'=>'Šar - pej','46'=>'Sarloški vučiji pas','96'=>'Šarplaninac','298'=>'Saseks španijel','264'=>'Senžermenski ptičar','35'=>'Šetlandski ovčar','321'=>'Ši-cu','170'=>'Šiba','143'=>'Sibirski haski','179'=>'Sicilijanski hrt','171'=>'Šikoku','234'=>'Šilerov gonič','132'=>'Silihem terijer','137'=>'Silki terijer','364'=>'Šiperki','133'=>'Skaj terijer','32'=>'Škotski ovčar - dugodlaki','33'=>'Škotski ovčar - kratkodlaki','131'=>'Škotski terijer','231'=>'Slovački gonič','282'=>'Slovački oštrodlaki ptičar','51'=>'Slovački pastirski pas','235'=>'Smolondski gonič','302'=>'Spanish Water Dog','204'=>'Španski brdski gonič','339'=>'Španski hrt','93'=>'Španski mastif','104'=>'Srednjeazijski ovčar','68'=>'Srednji šnaucer','221'=>'Srpski gonič','219'=>'Srpski trobojni gonič','7'=>'Stafordski bul terijer','237'=>'Štajerski oštrodlaki visokobrdski ...','252'=>'Stari danski ptičar','230'=>'Švajcarski gonič','245'=>'Švajcarski niskonogi gonič','246'=>'Švedski gonič drever','157'=>'Švedski pastirski pas','182'=>'Tajlandski ridžbek','181'=>'Tajvanski pas','105'=>'Tibetski mastif','322'=>'Tibetski španijel','323'=>'Tibetski terijer','228'=>'Tirolski gonič','288'=>'Toling retriver','362'=>'Tornjak','358'=>'Urugvajski kimaron','340'=>'Veliki engleski hrt - Grejhund','189'=>'Veliki englesko francuski gonič ...','190'=>'Veliki englesko francuski gonič, ...','188'=>'Veliki englesko-francuski belo ...','191'=>'Veliki englesko-francuski belo ...','239'=>'Veliki gaskonjski plavi gonič','193'=>'Veliki gaskonjsko sentanžujski ...','270'=>'Veliki minsterlendski ptičar','192'=>'Veliki plavi gaskonjski gonič','350'=>'Veliki portugalski hrt','67'=>'Veliki šnaucer','109'=>'Veliki švajcarski pastirski pas ...','241'=>'Veliki vandenski baset grifon','194'=>'Veliki vendejski grifon','36'=>'Velški korgi pembrok','300'=>'Velški špringer španijel','120'=>'Velški terijer','211'=>'Vendejski oštrodlaki gonič','201'=>'Vestfalski brak jazavičar','197'=>'Vidraš','149'=>'Zapadno sibirska lajka','134'=>'Zapadno škotski beli terijer','292'=>'Zlatni retriver',
        ];
        asort($this->dogBreeds);
        
        $m=['351'=>'Mešanac',];
        $this->dogBreeds = array_merge($m,$this->dogBreeds);
//!!! NEVER CHANGE BY ADDING IN ASSOCIATIVE ARRAY DIRECTLY //
//!!! dogBreeds and catBreeds especially !!!//
//!!! items are stored in databases by the values of final array so just use array_push('new element in array')
//* dont mind if its at the bottom and not in an asc order 

        $this->catBreeds = [
            '9'=>'Abisinska','24'=>'Američka bobtejl','25'=>'Američka kovrdžava','26'=>'Američka kratkodlaka','27'=>'Američka oštrodlaka','12'=>'Balineška','28'=>'Bengalska','19'=>'Birmanska','51'=>'Blue eyes','30'=>'Bombajka','31'=>'Britanska kratkodlaka','32'=>'Burmanska','33'=>'Burmila','35'=>'Cejlonska','38'=>'Devon reks','48'=>'Egipatska mau','40'=>'Egzota','42'=>'Havana','43'=>'Japanska bobtejl','15'=>'Javanska','34'=>'Kalifornijska tačkasta','36'=>'Kartuzijanka','14'=>'Kimrik','44'=>'Korat','37'=>'Korniš reks','62'=>'Kurilski bobtejl','45'=>'LaPerm','46'=>'Lynx house','49'=>'Mančkin','17'=>'Mandarinka','47'=>'Manks','16'=>'Mejn Kun','41'=>'Nemačka reks','13'=>'Norveška šumska','50'=>'Ociket','52'=>'Orijentalka','1'=>'Persijka','61'=>'Piksi bob','18'=>'Regdol','29'=>'Ruska plava','54'=>'Selkirk reks','59'=>'Sfinks','20'=>'Sibirka','55'=>'Sijamka','56'=>'Singapura','53'=>'Škotska fold','57'=>'Snoušu','58'=>'Sokoke','21'=>'Somalijka','60'=>'Tonkinška','11'=>'Turska angora','22'=>'Turska Van','23'=>'York čokoladna'
        ];
        asort($this->catBreeds);
 //!!! NEVER CHANGE BY ADDING IN ASSOCIATIVE ARRAY DIRECTLY //
//!!! dogBreeds and catBreeds especially !!!//
//!!! items are stored in databases by the values of final array so just use array_push('new element in array')
//* dont mind if its at the bottom and not in an asc order        
        $s=['351'=>'Domaća - Evropska kratkodlaka...',];
        $this->catBreeds = array_merge($s,$this->catBreeds);
//!!! NEVER CHANGE BY ADDING IN ASSOCIATIVE ARRAY DIRECTLY //
//!!! dogBreeds and catBreeds especially !!!//
//!!! items are stored in databases by the values of final array so just use array_push('new element in array')
//* dont mind if its at the bottom and not in an asc order 

//!!! NEVER CHANGE EXISTING KEY VALUES OF DOWN BELLOW ARRAYS
//can be added if ever needed new but never change
        $this->sex = ['M'=>'Muzjak', 'F'=>'Zenka',];
        
        $this->size = [ 'S'=>'Mali', 'M'=>'Srednje veličine', 'L'=>'Veliki', ];
        
        $this->furColor = ['d'=>'Crna', //d - dark
                            'w'=>'Bela',
                            'b'=>'Smeđa',
                            'g'=>'Siva',
                            'y'=>'Žuta',
                            'o'=>'Narandžasta',
                            'm'=>'Šarena',
                            ];
        $this->furColor2 = [
                            'n'=>'Nema',
                            'd'=>'Crna', //d - dark
                            'w'=>'Bela',
                            'b'=>'Smeđa',
                            'g'=>'Siva',
                            'y'=>'Žuta',
                            'o'=>'Narandžasta',
                            'm'=>'Tri i više boja',
                            ];
        $this->eyeColor = [
                            'd'=>'Crna', //d - dark
                            'b'=>'Smeđa',
                            'e'=>'Zelena', //e - emerald
                            'c'=>'Plava',
                            'y'=>'Žuta',
                            'o'=>'Narandžasta',
                            'g'=>'Siva',
                            'h'=>'Heterohromija',
                            ]; 

        $this->castratedOrSterialized = ['1'=>'Da', '0'=>'Ne',];
                
        $this->movedFromStreet = ['1'=>'Da', '0'=>'Ne',];
        
        $this->braceletColor = [
                    'n'=>'Nema ogrlicu',
                    'd'=>'Crna', //d - dark
                    'b'=>'Braon',
                    'w'=>'Bela',
                    'v'=>'Ljubičasta',
                    'p'=>'Roze',
                    'r'=>'Crvena',
                    'e'=>'Zelena', //e - emerald 
                    'c'=>'Plava', //c - cyanic
                    'y'=>'Žuta',
                    'o'=>'Narandžasta',
                    'g'=>'Siva',
                    'm'=>'Šarena',
                    ];
        
        $this->disability = ['1'=>'Da', '0'=>'Ne',];
        
                //selectData can be separately be declared in every method with needed variables 
                $this->selectData = [

                    'cities' => $this->cities,
                    'townships' => $this->townships,
                    'animals' => $this->animals,
                    'catBreeds' => $this->catBreeds,
                    'dogBreeds' => $this->dogBreeds,
                    'sex' => $this->sex,
                    'size' => $this->size,
                    'furColor' => $this->furColor,
                    'furColor2' => $this->furColor2,
                    'eyeColor' => $this->eyeColor,
                    'castratedOrSterialized' => $this->castratedOrSterialized,
                    'movedFromStreet' => $this->movedFromStreet,
                    'braceletColor' => $this->braceletColor,
                    'disability' => $this->disability,
                ];
    }
    
    
   public function seenPetsPageSelectOptions()
            {     
                $selectData = $this->selectData;
                //posibly define select data
                return view('seenPets')->with(compact('selectData'));
            } 
    
    function locatedPageSelectOptions()
            {     
                $selectData = $this->selectData;
                //posibly define select data
                return view('located')->with(compact('selectData'));
            } 
            
    function indexPageSelectOptions()
            {     
                $selectData = $this->selectData;
                //posibly define select data
                return view('index')->with(compact('selectData'));
            } 

    function searchResultPageSelectOptions()
            {     
                $selectData = $this->selectData;
                //posibly define select data
                return view('search-results')->with(compact('selectData'));
            } 
        
}
