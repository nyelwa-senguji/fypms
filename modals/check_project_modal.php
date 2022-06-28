<div id="check_project_modal" class="modal">

    <div class="modal-content">

        <div class="modal-header">
            <b>SEARCH PROJECT IN DATABASE</b>
            <span><i class="fas fa-times" id="close_check_project_modal" style="cursor: pointer;"></i></span>
        </div>

        <div class="modal-body">

            <label for="check_project_name">Project name</label>

            <input type="text" name="check_project_name" id="check_project_name" oninput="searchProjectInDatabase();" class="inp">

            <label for="project_results">RESULTS</label>

            <textarea name="project_results" id="project_results" cols="30" rows="10" class="inp"></textarea>

        </div>

    </div>

</div>