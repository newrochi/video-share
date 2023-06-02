<?php
namespace App\Services;

use FFMpeg\FFProbe;
use Illuminate\Support\Facades\Storage;

class FFmpegAdaptor{
    public $path;
    public function __construct(string $path)
    {
        $this->path=$path;
        $this->ffmpeg = \FFMpeg\FFMpeg::create();
        $this->ffprobe = \FFMpeg\FFProbe::create([
            'ffmpeg.binaries'  =>env('FFMPEG_BINARY') ,
            'ffprobe.binaries' => env('FFPROBE_BINARY'),
        ]);
        $this->video_probe=$this->ffprobe->format(Storage::path($this->path));
        $this->video=$this->ffmpeg->open(Storage::path($this->path));
    }

    public function getDuration(){
        return (int)$this->video_probe->get('duration');
    }

    public function getFrame(){


        $frame=$this->video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1));
                //->save(storage_path('app/public/frame.jpg'));
        $fileName=pathinfo($this->path,PATHINFO_FILENAME).'.jpg';
        $storage_path=storage_path('app/public/'.$fileName);
        $frame->save($storage_path);
        return $fileName;
    }
}
