Feature: Homepage

  View the homepage

  @api
  Scenario: Anonymous user visits homepage
    Given I go to the homepage
    And I am on the homepage
    Then I should see the text "Log in"
