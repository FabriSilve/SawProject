
<div class="container">
  <div class="row">
    <div class="col-*-*">
        <span class="col-sm-12">
            <h1>New Event</h1>
        </span>
    </div>
  </div>
  <div class="row">
      <span class="col-sm-4">
          <input type="text" name="name" id="name" placeholder="Name" class="radiusDiv padding5" required>
      </span>
      <span class="col-sm-4">
         <input type="date" name="day" id="day" class="radiusDiv padding5" required>
      </span>
      <span class="col-sm-4">
         <input type="text" name="address" id="address" placeholder="Address" class="radiusDiv padding5" required>
      </span>

  </div>
    <div class="row">
        <span class="col-sm-4">
            <br>
            <p>Description:</p>
          <textarea rows="8" name="description" id="description"  required>
          </textarea>
      </span>
        <!--TODO aggiungere update immagine
        <span class="col-sm-8">
          <input type="file" id="image" name="image" required>
      </span>-->
    </div>
    <div class="row">
        <span class="col-sm-12">
             <button class="radiusDiv" onclick="addEvent()">
                <img src="../media/plus.png"> <!-- todo campiare immagine in +-->
            </button>
        </span>
    </div>
    <div id="addMessage" class="row">
    </div>
</div>
