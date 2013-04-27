<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Transfers money from one Account to another.
 * Arguments:
 *  token, string   the security token
 *  user, string    the username if a password is needed
 *  pass, string    the password for the account (hashed with sha1)
 *  dest, int       ID of the destination account
 *  amount, int     amount of money to transfer
 *  reason, string  reason of the transfer
 *  notes, string   optional, additional notes for the transfer
 * Requirements
 *  token and pass (if needed) must qualify for transfer from <source>
 *  the balance of the <source> account must be over minimum amount after the transfer
 *  the <dest> argument must be a valid account
 *  the <reason> argument must only consist of allowed characters
 *  the <notes> argument must only consist of allowed characters
 *  Security requirements
 *      T_ACCOUNT with ROLE_BANK_ADMIN
 *   or T_ACCOUNT_SPEC with matching ROLE_ACCOUNT_OWNER  
 * Effects
 *  Logs a TransferRequested event
 *  If requirements are met:
 *      Transfers the money
 *      Creates and stores a new corresponding Transaction
 *      Logs a TransferSucceeded event
 *      Returns 200, Success
 *  If requirements are not met
 *      Logs a TransferFailed event
 *      Returns a 40x Response with the following return values
 *          A associative array of code => message, corresponding to every occured error
 * Possible HTTP-Statuscodes
 *  200, Success        The transfer was successful
 *  404, Not Found      Either the <source> or the <dest> account are invalid
 *  400, Bad Request    Arguments are missing or are invalid
 *  403, Forbidden      The <token> and/or <pass> do not qualify for a transfer from <source>
 * Possible Error-Codes:
 * 101    The <source> account is invalid
 * 102    The <token> is missing
 * 103    The <token> is syntactically invalid (not a sha1 hash)
 * 104    The <user> is missing
 * 105    The <user> contains illegal characters
 * 106    The <pass> is missing
 * 107    The <pass> is syntactically invalid (not a sha1 hash)
 * 108    The <dest> is missing
 * 109    The <dest> is syntactically invalid (not an int)
 * 110    The <amount> is missing
 * 111    The <amount> is syntactically invalid (not an int)
 * 112    The <reason> is missing
 * 113    The <reason> contains illegal characters
 * 114    The <notes> contain illegal characters
 * 115    The <token> does not qualify for a transfer from <source>
 * 116    The <user>/<pass> combination does not qualify for transfers from <source>
 * 117    The supplied <user>/<pass> combination is invalid
 * 118    The <dest> account is invalid
 * 119    The <source> account will be under the minimal-amount after the transaction
 */
$app->post('accounts/{source}/transferTo', function (Silex\Application $app, Request $r, $source) {
    // issue income log
    
    //validate request
    $validated = $app['validator.request']->validate($r, [
        'token' => [
            'required'      =>  [102, 'The token is missing'],
            'token'         =>  [103, 'The token is syntactically invalid (not a sha1 hash)'], 
        ],
        'user' => [
            'required'      =>  [104, 'The user is missing'],
            'valid-chars'   =>  [105, 'The user contains illegal characters'],
        ],
        'pass' => [
            'required'      =>  [106, 'The pass is missing'],
            'sha1'          =>  [107, 'The pass is syntactically invalid (not a sha1 hash)'],
        ],
        'dest' => [
            'required'      =>  [108, 'The dest is missing'],
            'int'           =>  [109, 'The dest is syntactically invalid (not an int)'],            
        ],
        'amount' => [
            'required'      =>  [110, 'The ammount is missing'],
            'int'           =>  [111, 'The amount is syntactically invalid (not an int)'],
        ],
        'reason' => [
            'required'      =>  [112, 'The reason is missing'],
            'valid-chars'   =>  [113, 'The reason contains illegal characters'],
        ],
        'notes' => [
            'valid-chars'   =>  [114, 'The notes contain illegal characters']
        ]
    ]
    );
    if($validated instanceOf ValidationFailure) {
        //in case of invalid request, return Error
        return $app->json($validated->getErrors(), 400);
    } else {
        $r = $validated->get();
    }
    
    // check if user is autorized
    
    // create Transfer
    
    // try Transfer by TransferManager
    // in case of success
        // store returned transaction
        // log TransferSuccess
        // send 200, Success
    // in case of failure
        // send 40x
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});

$app->get('', function (Silex\Application $app, Request $r) {
    
});





?>
