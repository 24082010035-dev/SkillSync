public function up(): void
{
    Schema::create('options', function (Blueprint $table) {
        $table->id();

        $table->foreignId('question_id')
            ->constrained('questions')
            ->onDelete('cascade');

        $table->string('option_text');

        // nilai bobot jawaban
        $table->integer('score')->default(0);

        $table->timestamps();
    });
}
