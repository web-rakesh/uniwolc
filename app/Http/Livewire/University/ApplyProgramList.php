<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Models\Student\ApplyProgram;

class ApplyProgramList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $programSelectId, $programList, $confirming, $backupPrograms, $backup_program_id, $reject_id;
    public $searchItem, $textareaValue = '';
    public $showModal = false, $mood = false, $program_status, $label ;
    public $student_id, $program_name, $startDate, $endDate;
    // public $paginationCount = 15;
    public function render()
    {
        $applyProgram = ApplyProgram::query()
            ->where('university_id', auth()->user()->id)
            ->where('status', 2)
            ->when($this->program_status, function ($query, $program_status) {
                if ($program_status == 4) {
                    // dd($program_status);
                    $query->where('program_status',  0);
                } else {
                    $query->where('program_status',  $program_status);
                }
            })
            ->when($this->programSelectId, function ($query, $programSelectId) {
                $query->where('program_id', $programSelectId);
            })
            ->whereBetween('created_at', [
                !empty($this->startDate) ? Carbon::parse($this->startDate)->startOfDay() : Carbon::now()->subMonth(), // Default to one month ago if not provided
                !empty($this->endDate) ?  Carbon::parse($this->endDate)->endOfDay() : Carbon::now(),
            ])
            ->paginate(10);




        // dd($this->program_status);
        $this->programList = Program::select('id', 'program_title')->where('user_id', auth()->user()->id)->get();


        return view('livewire.university.apply-program-list', ['applyProgramList' => $applyProgram]);
    }

    public function clearDate()
    {
        $this->startDate = null;
        $this->endDate = null;
    }

    public function confirmAccept($id)
    {
        $this->confirming = $id;
    }

    public function acceptProgram($id)
    {
        try {
            //code...
            // dd(ApplyProgram::find($id));
            DB::beginTransaction();
            ApplyProgram::find($id)->update([
                'program_status' => 1
            ]);
            session()->flash('message', 'Program accept Successfully.');
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }


    public function openModal($id, $mood = null)
    {
        $this->textareaValue = '';
        $this->reject_id = null;
        $applyProgram = ApplyProgram::find($id);

        $this->mood = false;
        if ($mood == 'reject') {
            $this->textareaValue = $applyProgram->remark;
            $this->program_name = ApplyProgram::find($applyProgram->reject_program)->program_title;
            $this->mood = true;
        } else {

            $this->student_id = $applyProgram->user_id;
            $this->reject_id = $applyProgram->id;
            $backup = json_decode($applyProgram->backup_program, true);

            $this->backupPrograms = Program::whereIn('id', explode(",", $backup))->get();
            // dd($backupPrograms);
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


    public function saveBackupReject()
    {
        // dd($this->reject_id);
        // dd($this->textareaValue);
        // dd($this->student_id);

        try {
            //code...
            // dd(ApplyProgram::find($id));
            DB::beginTransaction();
            $pg = ApplyProgram::where([['user_id', $this->student_id], ['id', $this->reject_id]])->first();
            $pg->update([
                'remark' => $this->textareaValue,
                'reject_program' => $this->reject_id,
                'program_status' => 3,
                'program_id' => $this->backup_program_id ?? $pg->program_id
            ]);
            session()->flash('message', 'Program accept Successfully.');
            DB::commit();
            $this->showModal = false;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            session()->flash(
                'message',
                $th->getMessage()
            );
        }
    }
}
