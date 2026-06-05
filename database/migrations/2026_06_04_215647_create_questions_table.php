public function up(): void
{
    Schema::create('questions', function (Blueprint $table) {
        $table->id();

        $table->foreignId('test_id')
            ->constrained('tests')
            ->onDelete('cascade');

        $table->text('question_text');

        $table->timestamps();
    });
}