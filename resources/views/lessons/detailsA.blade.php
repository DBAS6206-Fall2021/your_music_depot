@extends('layouts.app')

@section('content')
<div class="justify-content-center">

<div class="d-block-flex justify-content-center bg-white m-0 p-0">
        <div class="login" id="contentArea">
            <h1 class="display-4">Book a Lesson</h1>
            <form id="bookLessonForm" novalidate>
                <div id="messageArea"></div>
                <p class="hint-text">Select the Date for your Student's Lesson</p>
              
                <div class="form-group mb-2">
                        <label for="lessonType">Choose Type of Lesson:</label>
                        <div class="row">
                          <div class="col-md-12">
                            <select name="lessonType" id="lessonType" required>
                                <option value="0">-</option>
                                <option value="1">Piano</option>
                                <option value="2">Guitar</option>
                                <option value="3">Trumpet</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group mb-2">
                        <label for="lessonInstructor">Choose an Instructor:</label>
                        <div class="row">
                          <div class="col-md-12">
                            <select name="lessonInstructor" id="lessonInstructor" required>
                                <option value="0">-</option>
                                <option value="1">James Hancock</option>
                                <option value="2">Johan Bach</option>
                                <option value="3">Amadeus Mozart</option>
                            </select>
                          </div>
                        </div>
                      </div>     
                                                  
                <div class="text-right">
                    <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Next</button>
                </div>
            </form>
        </div>
</div>
@endsection