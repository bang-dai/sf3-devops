<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $_contentPage;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I load :arg1
     */
    public function iLoad($arg1)
    {
        $curl = curl_init($arg1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->_contentPage = curl_exec($curl);
    }

    /**
     * @Then i should see :arg1
     */
    public function iShouldSee($arg1)
    {
        if (!strstr($this->_contentPage, $arg1)) {
            sprintf("Could not see '%s'", $arg1);
            throw new PendingException();
        }
    }
}
