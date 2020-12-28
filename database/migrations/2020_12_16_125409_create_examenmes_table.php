<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenmes', function (Blueprint $table) {
            //$table->id();

            $table->increments('id');
            $table->integer('idempleado')->unsigned();   
            $table->foreign('idempleado')->references('id')-> on('Empleado')->onDelete('set null');
            $table->string('nombre');
            $table->string('imss')->nullable();         //clave candidata
            $table->string('sangre')->nullable();           //4 digitos max?
            $table->integer('edad')->nullable();
            $table->date('fechan')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('domicilio')->nullable(); 
            //$table->string('email'); 
            $table->string('telefon')->nullable();//->unsigned();
            $table->string('celfon')->nullable();
            $table->string('pac_estado')->nullable();
            $table->string('lugarnac')->nullable();
            $table->integer('cp')->nullable();
            
            $table->string('escolaridad')->nullable();

            $table->string('contactoeme')->nullable();
            $table->string('domicilioeme')->nullable();
            $table->string('telefoneme')->nullable();


            $table->date('fechaingreso')->nullable();   //was text olumn not found: 1054 Unknown column 'fechaingreso'
            $table->string('area')->nullable();
            $table->string('cc')->nullable();
            $table->string('numnomina')->nullable();
            $table->string('puestoac')->nullable();
            $table->string('tiempopues')->nullable();        //is date till now
            $table->string('puestoacdesc')->nullable();


            $table->text('ruidobox')->nullable();
            $table->text('vibracionbox')->nullable();
            $table->text('temperaturabox')->nullable();
            $table->text('polvobox')->nullable();
            $table->text('humobox')->nullable();
            $table->text('vaporbox')->nullable();
            $table->text('polvod')->nullable();

            $table->text('humod')->nullable();
            $table->text('vapord')->nullable();
            $table->text('quimbox')->nullable();
            $table->text('biolobox')->nullable();
            $table->text('quimd')->nullable();
            $table->text('biolod')->nullable();

            $table->text('ergopuesto')->nullable();
            $table->text('tamapuesto')->nullable();
            $table->text('troncodebajo')->nullable();
            $table->text('tronconivel')->nullable();
            $table->text('troncoencima')->nullable();
            $table->text('movrepetivo')->nullable();
            $table->text('movrepetivod')->nullable();
            $table->text('manejodecarga')->nullable();
            $table->text('manejodecargad')->nullable();


            $table->text('zapa')->nullable();
            $table->text('mandi')->nullable();
            $table->text('casc')->nullable();
            $table->text('tyve')->nullable();
            $table->text('lente')->nullable();
            $table->text('manga')->nullable();
            $table->text('care')->nullable();
            $table->text('masc')->nullable();
            $table->text('tapo')->nullable();
            $table->text('guan')->nullable();
            $table->text('faja')->nullable();
            $table->text('fajaotros')->nullable();
            $table->text('fajaotrosd')->nullable();

            $table->text('puestoanterior')->nullable();
            $table->text('areaanterior')->nullable();
            $table->text('duracionanterior')->nullable();
            $table->text('accianterior')->nullable();
            $table->text('ruidoanterior')->nullable();
            $table->text('tempanterior')->nullable();
            $table->text('vibraanterior')->nullable();
            $table->text('posturaanterior')->nullable();
            $table->text('sentadoanterior')->nullable();
            $table->text('malailuminaanterior')->nullable();
            $table->text('polvoanterior')->nullable();
            $table->text('polvoanteriord')->nullable();
            $table->text('vaporanterior')->nullable();
            $table->text('vaporanteriord')->nullable();
            
            $table->text('radiacionanterior')->nullable();
            $table->text('radiacionanteriord')->nullable();
            $table->text('manejodecargaanterior')->nullable();
            $table->text('manejodecargaanteriord')->nullable();
            $table->text('movrepetivoanterior')->nullable();
            $table->text('movrepetivoanteriord')->nullable();
            $table->text('accis')->nullable();
            $table->text('accisd')->nullable();
            $table->text('enfermas')->nullable();
            $table->text('enfermasd')->nullable();
           
            $table->text('diabetes')->nullable();
            $table->text('diabetesd')->nullable();
            $table->text('hipert')->nullable();
            $table->text('hipertd')->nullable();
            $table->text('bajapres')->nullable();
            $table->text('bajapresd')->nullable();
            $table->text('cardiac')->nullable();
            $table->text('cardiacd')->nullable();
            $table->text('pulmonares')->nullable();
            $table->text('pulmonaresd')->nullable();
            $table->text('renales')->nullable();
            $table->text('renalesd')->nullable();
             
            $table->text('hepati')->nullable();
            $table->text('hepatisd')->nullable();
            $table->text('enfermasangre')->nullable();
            $table->text('enfermasangred')->nullable();
            $table->text('depresion')->nullable();
            $table->text('depresiond')->nullable();
            $table->text('epileps')->nullable();
            $table->text('epilepsd')->nullable();
            $table->text('cancer')->nullable();
            $table->text('cancerd')->nullable();
            $table->text('embolia')->nullable();
            $table->text('emboliad')->nullable();

            $table->text('tiroides')->nullable();
            $table->text('tiroidesd')->nullable();
            $table->text('obesidad')->nullable();
            $table->text('obesidadd')->nullable();
            $table->text('visuales')->nullable();
            $table->text('visualesd')->nullable();
            $table->text('alergias')->nullable();
            $table->text('alergiasd')->nullable();
            $table->text('congenit')->nullable();
            $table->text('congenitd')->nullable();
            $table->text('huesos')->nullable();
            $table->text('huesosd')->nullable();

            $table->text('casatipo')->nullable();
            $table->text('casaservice')->nullable();
            $table->text('casanumero')->nullable();
            $table->text('casachavos')->nullable();
            $table->text('casarucos')->nullable();
            $table->text('casaenfermo')->nullable();
            $table->text('casaenfermod')->nullable();
            $table->text('mascotas')->nullable();
            $table->text('mascotasd')->nullable();
            $table->text('fumas')->nullable();
            $table->text('fumad')->nullable();

            $table->text('tomas')->nullable();
            $table->text('tomad')->nullable();
            $table->text('drogas')->nullable();
            $table->text('drogad')->nullable();
            $table->text('ejercicios')->nullable();
            $table->text('ejerciciosd')->nullable();
            $table->text('comidasdia')->nullable();
            $table->text('litrosdia')->nullable();

            $table->text('Verduras')->nullable();
            $table->text('Frutas')->nullable();
            $table->text('Pastas')->nullable();
            $table->text('Carneroja')->nullable();
            $table->text('Carneblanca')->nullable();
            $table->text('Embutidos')->nullable();
            $table->text('Lacteos')->nullable();
            $table->text('Leguminosas')->nullable();
            $table->text('Cereales')->nullable();
            $table->text('Chatarra')->nullable();

            $table->text('semabaño')->nullable();
            $table->text('semachones')->nullable();
            $table->text('semadientes')->nullable();
            $table->text('esquemavacun')->nullable();
            $table->text('Influenza')->nullable();
            $table->text('Tetanos')->nullable();
            $table->text('Hepatitisv')->nullable();
            $table->text('transfusion')->nullable();

            $table->text('Varicela')->nullable();
            $table->text('Paperas')->nullable();
            $table->text('Tuberculosis')->nullable();
            $table->text('Rubeola')->nullable();
            $table->text('Hepatitis')->nullable();
            $table->text('Oidostapados')->nullable();
            $table->text('Doloroidos')->nullable();
            $table->text('Dificultadescuchar')->nullable();
            $table->text('Obstrucnariz')->nullable();
            $table->text('secrenariz')->nullable();
            $table->text('sangranariz')->nullable();
            $table->text('estornudos')->nullable();

            $table->text('tosfrec')->nullable();
            $table->text('flemasan')->nullable();
            $table->text('Dificultadrespirar')->nullable();
            $table->text('silbidos')->nullable();
            $table->text('cansan')->nullable();
            $table->text('cansanescalar')->nullable();
            $table->text('opresiopecho')->nullable();
            $table->text('palpita')->nullable();
            $table->text('presionalta')->nullable();

            $table->text('mareo')->nullable();
            $table->text('varices')->nullable();
            $table->text('vomito')->nullable();
            $table->text('agruras')->nullable();
            $table->text('evacsangre')->nullable();
            $table->text('aumentopeso')->nullable();
            $table->text('cirujias')->nullable();
            $table->text('azucaralta')->nullable();
            $table->text('vesicula')->nullable();
            $table->text('fracturas')->nullable();

            $table->text('artritis')->nullable();
            $table->text('tendonitis')->nullable();
            $table->text('dolorespalda')->nullable();
            $table->text('ardororina')->nullable();
            $table->text('miccionnoche')->nullable();
            $table->text('calculos')->nullable();
            $table->text('difiorinar')->nullable();
            $table->text('sangreorina')->nullable();
            

            //

            $table->text('dolorsexo')->nullable();
            $table->text('secrepene')->nullable();
            $table->text('ets')->nullable();
            $table->text('riskysex')->nullable();
            $table->text('dolorcabeza')->nullable();
            $table->text('paralisis')->nullable();
            $table->text('convulsiones')->nullable();
            $table->text('adormeciextremi')->nullable();

            $table->text('comezonpiel')->nullable();
            $table->text('alergiamedicina')->nullable();
            $table->text('ardorojos')->nullable();
            $table->text('hongounas')->nullable();
            $table->text('miope')->nullable();
            $table->text('perfos')->nullable();
            $table->text('transfus')->nullable();
            $table->text('enftiroides')->nullable();


            $table->text('ginmenarc')->nullable();
            $table->text('iniciosex')->nullable();
            $table->text('numparejas')->nullable();
            $table->text('metodosp')->nullable();

            $table->text('gestas')->nullable();
            $table->text('partos')->nullable();
            $table->text('cesars')->nullable();
            $table->text('aborts')->nullable();
            $table->text('ultimoparto')->nullable();
            $table->text('ultimamam')->nullable();
            $table->text('ultimamast')->nullable();
            $table->text('ultimamastd')->nullable();

            $table->text('pesosignos')->nullable();
            $table->text('tallasignos')->nullable();
            $table->text('imcsignos')->nullable();
            $table->text('dxtxsignos')->nullable();
            $table->text('taisignos')->nullable();
            $table->text('tadsignos')->nullable();
            $table->text('fcsignos')->nullable();
            $table->text('frsignos')->nullable();
            $table->text('tempsignos')->nullable();

            $table->text('agusignos')->nullable();
            $table->text('binocusignos')->nullable();
            $table->text('ccsignos')->nullable();
            $table->text('sinodsignos')->nullable();
            $table->text('conodsignos')->nullable();
            $table->text('agucercasignos')->nullable();
            $table->text('campisignos')->nullable();
            $table->text('daltosignos')->nullable();
            $table->text('habisignos')->nullable();


            $table->text('excabeza')->nullable();
            $table->text('excraneo')->nullable();
            $table->text('excara')->nullable();
            $table->text('expupi')->nullable();
            $table->text('exconjun')->nullable();
            $table->text('exnariz')->nullable();
            $table->text('exboca')->nullable();
            $table->text('excavi')->nullable();
            $table->text('examigda')->nullable();
            $table->text('exfarin')->nullable();

            $table->text('exesdental')->nullable();
            $table->text('exoi')->nullable();
            $table->text('exoip')->nullable();
            $table->text('exoic')->nullable();
            $table->text('exoit')->nullable();
            $table->text('exoia')->nullable();
            $table->text('exod')->nullable();
            $table->text('exodp')->nullable();
            $table->text('exodc')->nullable();
            $table->text('exodt')->nullable();
            $table->text('exoda')->nullable();

            $table->text('excuello')->nullable();
            $table->text('extorax')->nullable();
            $table->text('exmovresp')->nullable();
            $table->text('exruidocardia')->nullable();
            $table->text('excampospulmo')->nullable();
            $table->text('exmamas')->nullable();
            $table->text('exabdomen')->nullable();
            $table->text('exausculta')->nullable();
            $table->text('expalpa')->nullable();

            $table->text('exviscero')->nullable();
            $table->text('exhernias')->nullable();
            $table->text('extumor')->nullable();
            $table->text('exobserva')->nullable();
            $table->text('exgenit')->nullable();
            $table->text('exurin')->nullable();
            $table->text('excolumn')->nullable();
            $table->text('exexsup')->nullable();
            $table->text('exexinf')->nullable();
            $table->text('expiel')->nullable();
            $table->text('exnerv')->nullable();
            $table->text('diagnos')->nullable();
            $table->text('observa')->nullable();
            $table->text('recomenda')->nullable();
            $table->text('apto')->nullable();
            $table->text('firma')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenmes');
    }
}
