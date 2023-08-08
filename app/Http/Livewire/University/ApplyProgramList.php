<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\University\Program;
use Illuminate\Support\Facades\DB;
use App\Models\Student\ApplyProgram;

class ApplyProgramList extends Component
{
    use WithPagination;

    public $programSelectId, $programList, $confirming, $backupPrograms, $backup_program_id, $reject_id;
    public $searchItem, $textareaValue = '';
    public $showModal = false;
    public $student_id;
    // public $paginationCount = 15;
    public function render()
    {
        $this->programList = Program::select('id', 'program_title')->where('user_id', auth()->user()->id)->get();
        $applyProgram = Program::query()->with('getProgram')
            ->where('user_id', auth()->user()->id)
            ->whereHas('getProgram', function ($q) {
                $q->where('status', 2);
            })

            ->when($this->programSelectId, function ($query, $programSelectId) {
                $query->where('id', $programSelectId);
            })

            ->paginate(15);
        // $applyProgram = Program::with('getProgram')->where('user_id', auth()->user()->id)->get();
        // dd($applyProgram);


        return view('livewire.university.apply-program-list', ['applyPrograms' => $applyProgram]);
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


    public function openModal($id)
    {
        $this->textareaValue = '';
        $applyProgram = ApplyProgram::find($id);
        $this->student_id = $applyProgram->user_id;
        $this->reject_id = $applyProgram->id;
        $backup = json_decode($applyProgram->backup_program, true);

        $this->backupPrograms = Program::whereIn('id', explode(",", $backup))->get();
        // dd($backupPrograms);

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
