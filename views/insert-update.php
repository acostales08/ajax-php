<main>
    <div class="container">
        <div class="col">
            <div class="form-container">
                <input type="text" class="form-control" id="txtid" hidden>
                <div class="form-group">
                    <label for="txtfirstName">First Name</label>
                    <input type="text" class="form-control" id="txtfirstName">
                </div>
                <div class="form-group">
                    <label for="txtmiddleName">middle Name</label>
                    <input type="text" class="form-control" id="txtmiddleName">
                </div>
                <div class="form-group">
                    <label for="txtlastName">last Name</label>
                    <input type="text" class="form-control" id="txtlastName">
                </div>
                <div class="form-group">
                    <label for="txtage">age</label>
                    <input type="number" class="form-control" id="txtage">
                </div>
                <div class="btn-group">
                    <input class="btn" type="button" value="create user" id="btnCreate">
                    <input class="btn" type="button" value="Update user" id="btnUpdate">
                </div>

            </div>
        </div>
        <div class="col">
            <table id="table-person">
                <thead>
                    <tr>
                        <th>last name</th>
                        <th>first name</th>
                        <th>middle name</th>
                        <th>age</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody id="personsData"></tbody>
            </table>
        </div>
    </div>
</main>