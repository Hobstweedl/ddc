<form method="POST" action="{{ route('notes.store') }}">
  {{ csrf_field() }}
  <input type="hidden" name="notable_type" value="{{$notable_type}}"/>
  <input type="hidden" name="notable_id" value="{{$notable_id}}"/>
  <div class="field has-addons">
  <div class="control is-expanded">
    <input class="input" type="textarea" name="Content" placeholder="Content" required>
  </div>
  <div class="control">
    <button class="button is-primary" type="submit">Add Note</button>
  </div>
</div>
</form>