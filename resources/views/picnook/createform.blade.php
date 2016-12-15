<div id="selectionoptions">
    <form method="POST" action="/store" >
        {{ csrf_field() }}
        <fieldset>
        <label for = "frameselect">select frame:</label>
        <select id ="frameselect" name='frameselect'>
        	<option id="black">black</option>
        	<option id="silver">silver</option>
        	<option value="#321414">seal brown</option>
        	<option value="#4f3A3c">dark puce</option>
        	<option value="#645452">wenge</option>
        	<option value="#4B3621">cafe noir</option>
        	<option value="DarkSlateGray">slate gray</option>
        </select>
        <label for ="matselect">select matting:</label>
        <select id="matselect" name='matselect'>
        	<option value="none">none</option>
        	<option value="white">white</option>
        	<option value="AntiqueWhite">antique white</option>
        	<option value="SeaShell">seashell</option>
        	<option value="OldLace">old lace</option>
        	<option value="MintCream">mint cream</option>
        </select>
        </fieldset>
        <fieldset>
            <label for="framethick">select frame thickness</label>
            <input type ="range" id="framethick" name= 'framethick' min='0.25' max='2' step='0.25' value='0.25'>
            <label for="matthick">select mat width</label>
            <input type="range" id="matthick" name='matthick' min='0.25' max ='2' step='0.25' value='0.25'>
        </fieldset>
        <fieldset>
            <input type="hidden" name='key' value={{$key}}>
            <input type="hidden" name="cost" value="155.00">
            <label for = 'addwishlist'>add to wishlist?</label>
            <input type='submit' value="Submit" id="addwishlist">
        </fieldset>
    </form>  
    <div id="browse">
        <a id="keepbrowse" href="/home">keep browsing?</a>
    </div>
</div>