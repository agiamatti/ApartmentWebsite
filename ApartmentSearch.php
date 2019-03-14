<?php
//header
$page_title="Apartment Search";
require("pageHeader.php");
?>
<h3> Search for an Apartment</h3>

    <form class="appartmentSearch" action="/search.php" method="POST">
        <fieldset class="info">
            <legend class="info">Renter(s) Infromation</legend>

            <strong>How many people will live in the apartment?:</strong>
            <input type="number" name="Quantity" min="1" max="10" />
            <br />
            <br />

            <strong>Smoker?</strong>
            <label>
                    <input type="radio" name="Smoker" value="yes" /> Yes
                </label>
            <label>
                    <input type="radio" name="Smoker" value="no" /> No
                </label>
            <br />
            <br />
            <strong>Any pets?</strong>
            <br />
            <br />
            <label>
                    <input type="checkbox" name="Pets[]" value="Cat" /> Cat(s)
                </label>
            <br />
            <label>
                    <input type="checkbox" name="Pets[]" value="Dog" /> Dog(s)
                </label>
            <br />
            <input type="checkbox" name="Pets[]" value="Other"/>
                    Other &nbsp; &nbsp; &nbsp; <strong>Specify:</strong>
            <input type="text" name="OtherPets" size="15"/>
            <br />
            <input type="checkbox" name="Pets[]" value="None" />
            <label> No Pets</label>
        </fieldset>
        <br />
        <fieldset class="param">
            <legend class="param">What are you looking for?</legend>
            <ul>
                <li>
                    <strong>Size of apartment:</strong>
                    <label>
                            <input type="checkbox" name="Size[]" value="2.5" onclick="checkSize(1)" /> Studio
                        </label>
                    <label>
                            <input type="checkbox" name="Size[]" value="3.5" onclick="checkSize(10)" /> 3 &#189;
                        </label>
                    <label>
                            <input type="checkbox" name="Size[]" value="4.5" onclick="checkSize(100)" /> 4 &#189;
                        </label>
                    <label>
                            <input type="checkbox" name="Size[]" value="5.5" onclick="checkSize(1000)" /> 5 &#189;
                        </label>
                    <label>
                            <input type="checkbox" name="Size[]" value="6.5" onclick="checkSize(10000)" /> More than 5 &#189;
                        </label>
                    <br />
                    <br />
                </li>
                <li>
                    <strong>Do you have preferred locations?</strong>
                    <label>
                            <input type="checkbox" name="Location[]" value="West Island" onclick="isDowntown(0)" /> West Island
                        </label>
                    <label>
                            <input type="checkbox" name="Location[]" value="Downtown" onclick="isDowntown(1)" /> Downtown
                        </label>
                    <label>
                            <input type="checkbox" name="Location[]" value="Lower Westmount" onclick="isDowntown(0)" /> Lower Westmount
                        </label>
                    <label>
                            <input type="checkbox" name="Location[]" value="NDG" onclick="isDowntown(0)" /> NDG
                        </label>
                    <label>
                            <input type="checkbox" name="Location[]" value="East Island" onclick="isDowntown(0)" /> East end of Island
                        </label>
                    <label>
                            <input type="checkbox" name="Location[]" value="No opinion" onclick="isDowntown(0)" /> Don't Care
                        </label>
                    <br />
                    <br />
                </li>
                <li>
                    <strong>Price Range/month:</strong><br />
                    <select name="PriceRange" onchange="checkPriceRange(this.value)">
                            <option value="10000">
                                No price limit
                            </option>
                            <option value="400">
                                &lt;$500
                            </option>
                            <option value="800">
                                $500-$999
                            </option>
                            <option value="1500">
                                $1000-2000
                            </option>
                            <option value="2500">
                                &gt;$2000
                            </option>
                        </select>
                    <br />
                    <br />
                </li>
                <li>
                    <strong>Would be nice to have:</strong>
                    <label>
                            <input type="checkbox" name="Feature[]" value="Fireplace" /> Fire Place
                        </label>
                    <label>
                            <input type="checkbox" name="Feature[]" value="Laundry" /> Laudromat in building
                        </label>
                    <label>
                            <input type="checkbox" name="Feature[]" value="Indoor Parking" /> Indoor Parking
                        </label>
                    <label>
                            <input type="checkbox" name="Feature[]" value="Outdoor Parking" /> Outdoor Parking
                        </label>
                    <label>
                            <input type="checkbox" name="Feature[]" value="Balcony" /> Balcony
                        </label>
                </li>
            </ul>
        </fieldset><br />
        <fieldset class="expert" id="expertSuggestions">
            <legend class="expert">Expert suggestions</legend>
            <p id="output">&nbsp;</p>
        </fieldset>
      <p>
        <input type="submit" value="Search"/>
        <input type="reset" value="Start over" onclick="resetSearch()"/>
      </p>
    </form>

<?php
//page footer
require("pageFooter.php");
?>
