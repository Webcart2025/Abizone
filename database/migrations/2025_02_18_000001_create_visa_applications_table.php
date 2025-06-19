use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('visa_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('application_id')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visa_applications');
    }
} 