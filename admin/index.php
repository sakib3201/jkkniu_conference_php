<?php include("admin_header.php"); ?>
<div class="container-fluid mt-3 text-center">
    <h3>Admin Dashboard</h3>
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>Add Speaker</h6>
                <a href="add_speaker_details.php">Add</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>View Speakers</h6>
                <a href="show_all_speakers.php">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>Add Committee Member</h6>
                <a href="add_committee_details.php">Add</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>View Committee Members</h6>
                <a href="committee_details.php">View</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>Add Important Date</h6>
                <a href="add_important_dates.php">Add</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>View Important Dates</h6>
                <a href="show_all_dates.php">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>Add Call For Paper</h6>
                <a href="add_call_for_paper.php">Add</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>View Call For Papers</h6>
                <a href="show_all_call_for_papers.php">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>View Extended Abstract</h6>
                <a href="show_all_papers.php">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5">
                <h6>View Authors</h6>
                <a href="view_authors.php">View</a>
            </div>
        </div>
    </div>
</div>
<?php include("admin_footer.php"); ?>