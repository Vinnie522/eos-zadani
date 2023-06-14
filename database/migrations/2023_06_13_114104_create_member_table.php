  <?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('jmeno');
            $table->string('prijmeni');
            $table->string('email');
            $table->string('narozeni');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('member');
    }
} 
