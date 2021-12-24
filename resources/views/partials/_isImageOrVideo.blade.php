@if($article->isImage())
    <a href="{{$article->filePath}}"><img src="{{$article->filePath}}" alt="" style="max-height: 19.6875em; min-width: 100%;"></a>

    {{-- file is a video  --}}
@elseif($article->isVideo())
    <video controls="" class="w-full" name="media" onclick="this.paused ? this.play() : this.pause();"> 
      <source src="/{{$article->filePath}}">
    </video>
@elseif($article->isPdf())
    <iframe  class="w-full" 
    src="{{$article->filePath}}">
    </iframe>
@elseif($article->haslink())
    <iframe width="100%" height="315" class="rounded-xl" 
    src="{{$article->link}}">
    </iframe>                         
@endif 