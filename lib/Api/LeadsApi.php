<?php
/**
 * LeadsApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * IRIS API
 *
 * # Introduction Welcome to IRIS’s API!  The API is organized around `REST`. All requests should be made over `SSL`.  All request and response bodies, including errors, are encoded in `JSON`. # Open API The Open API provides numerous functions to access or to update your CRM lead  and merchant  data using simple REST calls. ### You can use the Lead API to: - Get a list of leads with field data, notes, appointments, tasks, users and, documents - Get a list of available campaigns, groups, sources, and statuses - Create a new lead, lead note, task, or an appointment - Assign and un-assign users to a lead - Upload or download documents - Update field data, status, campaign, group, and source - Generate an e-signature application and get a list of available apps  ### You can use the Merchant API to: - Get daily merchant deposits and transactions - Get daily chargebacks and retrievals - Get monthly merchant PDF statements - Get a list of merchants by demographics such as processor or group - Get merchant demographic profile information using the merchant id - Make updates to merchant profiles in real-time  # Generate an API token When you send an API request, you will need to include an API token in your request in order to authenticate your account.  The tokens are generated in the CRM by each user individually, and each user may create one or more tokens.  To generate a new API Token, open your user settings page by clicking on your username in the top-right corner, and clicking on the ** Settings ** link or you can use the <a href=\"https://iriscrm.com/settings\">link</a>.  Then open the ** API Settings ** tab, click ** Create New API Token **, configure your token’s settings as needed, and click ** Add New Token **:  <img src='https://iriscrm.com/images/docs/mapi001.png'/>  Your new token will now be created and displayed in a popup window:  <img src='https://iriscrm.com/images/docs/mapi002.png'/>  Once the token is created, it will be shown in the list of available API Tokens where you can copy the token, update its settings, or delete it once it’s no longer needed:  <img src='https://iriscrm.com/images/docs/mapi003.png'/>  ** Note: ** The created tokens will inherit the user’s permissions to assigned merchants, leads, groups and processors. # Using the API Authentication to the API is performed via `X-API-KEY` header. Requests not properly authenticated will return a `401` error code.  `curl -X GET \"https://iriscrm.com/api/v1/leads\" -H \"accept: application/json\" -H \"X-API-KEY: [YOURKEY]\"`  Note that all requests should be made over `SSL`. All request and response bodies, including errors, are encoded in JSON.  The API returns standard HTTP success or error status codes. In case of errors, additional information about what went wrong will be encoded in the response as JSON.  By default, you can make `120` requests per minute. Check the returned HTTP headers of any API request to see your current rate limit status. # Using the Subscription API API Subscriptions are used to send information about an event to a URL and trigger an API call. This is more efficient than doing scheduled API calls.  To create a subscription, use the API Settings page or send a request using the instructions in the Subscriptions section below.  All you need to know is the events you want to be subscribed for and the url to which the updates need to be sent.  To create subscriptions using our GUI open tab ** API Settings ** at ** https://iriscrm.com/settings **:  <img src='https://iriscrm.com/images/docs/new-subscription.png'/> # Authentication Authenticate your account by including your secret key in API requests. Do not share your secret API keys in publicly accessible areas, client-side code, and so forth. Authentication to the API is performed via `X-API-KEY` header. Requests not properly authenticated will return a `401` error code. # Errors Our API returns standard `HTTP` success or error status codes. For errors, we will also include extra information about what went wrong encoded in the response as `JSON`. # Limiting You can make `120` requests per minute. If you will reach a limit you will get a `429: Too Many Attempts.` response from the server. Check the returned `HTTP` headers of any API request to see your current rate limit status. Headers description: * `X-RateLimit-Limit` tells you the max number of requests you're allowed to make within this application's time period * `X-RateLimit-Remaining` tells you how many requests you have left within this current time period * `Retry-After` tells you how many seconds to wait until you try again. (you'll only get `Retry-After` if you've hit the limit).   # PHP SDK  ### Installation and Usage  #### Availability  The IRIS CRM PHP SDK requires PHP version 5.5 or higher and the PHP cURL extension.  #### Composer  To install the bindings via [Composer](http://getcomposer.org/), please run:  ```bash  composer require iris-crm/php-sdk      ```   In your code, configure the environment and API credentials:  ```php require_once(__DIR__ . '/vendor/autoload.php');  use Swagger\\Client\\Configuration; use Swagger\\Client\\Api\\LeadsApi;  // Configure API key authorization $config = Configuration::getDefaultConfiguration() ->setApiKey('X-API-KEY', 'YOUR_API_KEY') ->setHost('https://iriscrm.com/api/v1/'); ``` Here’s an example of how to get a list of leads using an SDK. Swagger\\Client\\Api\\LeadsApi it's a SDK Class for Lead endpoints. ```php $apiInstance = new LeadsApi(null, $config);  $page        = 1; // int | Page number $sort_by     = \"created\"; // string | Sorting of leads by the field value $sort_dir    = \"asc\"; // string | Direction of sorting $group       = 2; // int | Filter leads by a group id $campaign    = 3; // int | Filter leads by a campaign id $source      = 4; // int | Filter leads by a source id $status      = 1; // int | Filter leads by a status id $category    = 1; // int | Filter leads by a status category id $user        = 12; // int | Filter leads by a user id $date_filter = \"created\"; // string | Filtering leads by a date range depends on this filter $start_date  = new \\DateTime(\"2018-10-20T19:20:30+01:00\"); // \\DateTime | Filter leads by a date in ISO 8601 format (Y-m-d\\\\TH:i:sP) $end_date    = new \\DateTime(\"2019-10-20T19:20:30+01:00\"); // \\DateTime | Filter leads by a date in ISO 8601 format (Y-m-d\\\\TH:i:sP) $email       = \"test@mail.com\"; // string | Filter leads by a email try {     $result = $apiInstance->leadsGet($page, $sort_by, $sort_dir, $group, $campaign, $source, $status, $category, $user, $date_filter, $start_date, $end_date, $email);     print_r($result); } catch (Exception $e) {     echo 'Exception when calling LeadsApi->leadsGet: ', $e->getMessage(), PHP_EOL; } ``` All parameters for leadsGet method is optional and can be skipped.  If you want skip some parameters - you need to set parameter to `null`  All available classes and methods you can get in \"API Endpoints\" section below. ### API Endpoints All URIs are relative to *https://iriscrm.com/api/v1*  Class | Method | HTTP Request | Description ------------ | ------------- | ------------- | ------------- *LeadsApi* | **leadsApplicationsAppIdMappingsGet** | **GET** /leads/applications/{appId}/mappings | Get a list of available application field mappings *LeadsApi* | **leadsApplicationsAppIdMappingsMapIdDelete** | **DELETE** /leads/applications/{appId}/mappings/{mapId} | Delete an application field mapping *LeadsApi* | **leadsApplicationsAppIdMappingsMapIdGet** | **GET** /leads/applications/{appId}/mappings/{mapId} | Get a application field mapping *LeadsApi* | **leadsApplicationsAppIdMappingsMapIdPatch** | **PATCH** /leads/applications/{appId}/mappings/{mapId} | Update an application field mapping *LeadsApi* | **leadsApplicationsAppIdMappingsPost** | **POST** /leads/applications/{appId}/mappings | Create a new application field mapping *LeadsApi* | **leadsApplicationsGet** | **GET** /leads/applications | Get a list of available applications *LeadsApi* | **leadsCampaignsGet** | **GET** /leads/campaigns | Get a list of available campaigns *LeadsApi* | **leadsDynamicFieldsSchemaGet** | **GET** /leads/dynamic-fields-schema | Get a schema of lead fields *LeadsApi* | **leadsEmailsTemplatesGet** | **GET** /leads/emails/templates | Get list of email templates *LeadsApi* | **leadsFieldsFieldIdGet** | **GET** /leads/fields/{fieldId} | Get a lead field *LeadsApi* | **leadsFieldsFieldIdOrderPatch** | **PATCH** /leads/fields/{fieldId}/order | Update a lead field order position *LeadsApi* | **leadsFieldsFieldIdPatch** | **PATCH** /leads/fields/{fieldId} | Update a lead field *LeadsApi* | **leadsFieldsGet** | **GET** /leads/fields | Get a list of available lead fields *LeadsApi* | **leadsFieldsPost** | **POST** /leads/fields | Create a new lead field *LeadsApi* | **leadsFieldsTabsGet** | **GET** /leads/fields/tabs | Get a list of all lead field tabs *LeadsApi* | **leadsFieldsTabsPost** | **POST** /leads/fields/tabs | Create a lead field tab *LeadsApi* | **leadsFieldsTabsTabIdGet** | **GET** /leads/fields/tabs/{tabId} | Get a lead field tab *LeadsApi* | **leadsFieldsTabsTabIdPatch** | **PATCH** /leads/fields/tabs/{tabId} | Update a lead field tab *LeadsApi* | **leadsGet** | **GET** /leads | Get a list of leads *LeadsApi* | **leadsGroupsGet** | **GET** /leads/groups | Get a list of available groups *LeadsApi* | **leadsLeadIdActivityCampaignGet** | **GET** /leads/{leadId}/activity/campaign | Get a list of all lead campaign activity *LeadsApi* | **leadsLeadIdActivityDeletionGet** | **GET** /leads/{leadId}/activity/deletion | Get a list of all lead deletion activity *LeadsApi* | **leadsLeadIdActivityDuplicatesGet** | **GET** /leads/{leadId}/activity/duplicates | Get a list of all lead duplicate activity *LeadsApi* | **leadsLeadIdActivityLinksGet** | **GET** /leads/{leadId}/activity/links | Get a list of all lead links activity *LeadsApi* | **leadsLeadIdActivitySourceGet** | **GET** /leads/{leadId}/activity/source | Get a list of all lead source activity *LeadsApi* | **leadsLeadIdActivityStatusGet** | **GET** /leads/{leadId}/activity/status | Get a list of all lead status activity *LeadsApi* | **leadsLeadIdApplicationsApplicationIdPopulatePost** | **POST** /leads/{leadId}/applications/{applicationId}/populate | Populate PDF Document *LeadsApi* | **leadsLeadIdAppointmentsGet** | **GET** /leads/{leadId}/appointments | Get lead appointments *LeadsApi* | **leadsLeadIdAppointmentsPost** | **POST** /leads/{leadId}/appointments | Create a lead appointment *LeadsApi* | **leadsLeadIdDocumentsDocumentIdGet** | **GET** /leads/{leadId}/documents/{documentId} | Download a document *LeadsApi* | **leadsLeadIdDocumentsGet** | **GET** /leads/{leadId}/documents | Get a list of available documents *LeadsApi* | **leadsLeadIdDocumentsPost** | **POST** /leads/{leadId}/documents | Upload a document *LeadsApi* | **leadsLeadIdEmailsTemplateIdPost** | **POST** /leads/{leadId}/emails/{templateId} | Send an email to lead with template *LeadsApi* | **leadsLeadIdGet** | **GET** /leads/{leadId} | Get detailed lead information *LeadsApi* | **leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet** | **GET** /leads/{leadId}/mailbox/{emailId}/attachment/{attachmentId} | Download a mailbox email attachment *LeadsApi* | **leadsLeadIdNotesGet** | **GET** /leads/{leadId}/notes | Get lead notes *LeadsApi* | **leadsLeadIdNotesPost** | **POST** /leads/{leadId}/notes | Create a lead note *LeadsApi* | **leadsLeadIdPatch** | **PATCH** /leads/{leadId} | Update a lead *LeadsApi* | **leadsLeadIdSignaturesApplicationIdGeneratePost** | **POST** /leads/{leadId}/signatures/{applicationId}/generate | Generate an e-signature document *LeadsApi* | **leadsLeadIdSignaturesApplicationIdSendPost** | **POST** /leads/{leadId}/signatures/{applicationId}/send | Send an e-signature document *LeadsApi* | **leadsLeadIdSignaturesGet** | **GET** /leads/{leadId}/signatures | Get a list of all lead e-signatures documents *LeadsApi* | **leadsLeadIdSmsTemplateIdPost** | **POST** /leads/{leadId}/sms/{templateId} | Send an sms to lead with selected sms template *LeadsApi* | **leadsLeadIdTasksGet** | **POST** /leads/{leadId}/tasks | Create a lead task *LeadsApi* | **leadsLeadIdUsersGet** | **GET** /leads/{leadId}/users | Get a list of assigned users *LeadsApi* | **leadsLeadIdUsersPost** | **POST** /leads/{leadId}/users | Assign a user *LeadsApi* | **leadsLeadIdUsersUserIdDelete** | **DELETE** /leads/{leadId}/users/{userId} | Unassign a user from a lead *LeadsApi* | **leadsPost** | **POST** /leads | Create a lead *LeadsApi* | **leadsSignaturesApplicationIdDownloadGet** | **GET** /leads/signatures/{applicationId}/download | Download an e-signature document *LeadsApi* | **leadsSmsTemplatesGet** | **GET** /leads/sms/templates | Get list of sms templates *LeadsApi* | **leadsSourcesGet** | **GET** /leads/sources | Get a list of available sources *LeadsApi* | **leadsStatusesGet** | **GET** /leads/statuses | Get a list of available statuses *LeadsApi* | **leadsUsersGet** | **GET** /leads/users | Get a list of available users *MerchantsApi* | **merchantsGet** | **GET** /merchants | Get a list of merchants *MerchantsApi* | **merchantsMerchantNumberChargebacksGet** | **GET** /merchants/{merchantNumber}/chargebacks | Get a list of chargebacks *MerchantsApi* | **merchantsMerchantNumberGet** | **GET** /merchants/{merchantNumber} | Get detailed merchant information *MerchantsApi* | **merchantsMerchantNumberPatch** | **PATCH** /merchants/{merchantNumber} | Update an existing merchant *MerchantsApi* | **merchantsMerchantNumberRetrievalsGet** | **GET** /merchants/{merchantNumber}/retrievals | Get a list of retrievals *MerchantsApi* | **merchantsMerchantNumberStatementsGet** | **GET** /merchants/{merchantNumber}/statements | Get a list of statements *MerchantsApi* | **merchantsMerchantNumberStatementsStatementIdGet** | **GET** /merchants/{merchantNumber}/statements/{statementId} | Download a statement *MerchantsApi* | **merchantsMerchantNumberTransactionsGet** | **GET** /merchants/{merchantNumber}/transactions | Get a list of batches and transactions *SubscriptionsApi* | **subscriptionsGet** | **GET** /subscriptions | Return a list of subscriptions *SubscriptionsApi* | **subscriptionsPost** | **POST** /subscriptions | Create a subscription *SubscriptionsApi* | **subscriptionsSampleApiUpdatedGet** | **GET** /subscriptions/sample/api.updated | Data sample for the \\&quot;api.updated\\&quot; event *SubscriptionsApi* | **subscriptionsSampleApplicationCreatedGet** | **GET** /subscriptions/sample/turboapp.submitted | Data sample for the \\&quot;turboapp.submitted\\&quot; event *SubscriptionsApi* | **subscriptionsSampleApplicationUpdatedGet** | **GET** /subscriptions/sample/turboapp.updated | Data sample for the \\&quot;turboapp.updated\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadCreatedGet** | **GET** /subscriptions/sample/lead.created | Data sample for the \\&quot;lead.created\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadDeletedGet** | **GET** /subscriptions/sample/lead.deleted | Data sample for the \\&quot;lead.deleted\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadDocumentUploadedGet** | **GET** /subscriptions/sample/lead.document.uploaded | Data sample for the \\&quot;lead.document.uploaded\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadEmailReceivedGet** | **GET** /subscriptions/sample/lead.email.received | Data sample for the \\&quot;lead.email.received\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadNoteAddedGet** | **GET** /subscriptions/sample/lead.note.added | Data sample for the \\&quot;lead.note.added\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadRestoredGet** | **GET** /subscriptions/sample/lead.restored | Data sample for the \\&quot;lead.restored\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadStatusUpdatedGet** | **GET** /subscriptions/sample/lead.status.updated | Data sample for the \\&quot;lead.status.updated\\&quot; event *SubscriptionsApi* | **subscriptionsSampleLeadUpdatedGet** | **GET** /subscriptions/sample/lead.updated | Data sample for the \\&quot;lead.updated\\&quot; event *SubscriptionsApi* | **subscriptionsSubscriptionIdDelete** | **DELETE** /subscriptions/{subscriptionId} | Delete a subscription *SubscriptionsApi* | **subscriptionsSubscriptionIdGet** | **GET** /subscriptions/{subscriptionId} | Return a subscription by its id *SubscriptionsApi* | **subscriptionsSubscriptionIdPatch** | **PATCH** /subscriptions/{subscriptionId} | Update a subscription # Change Log   ### 1.3.1 (2019-10-25)   #### Updated:   * Rename subscriptions from \"application.created\" to \"turboapp.submitted\" and \"application.updated\" to \"turboapp.updated\". **Link:** [#/paths/~1subscriptions~1sample~1turboapp.submitted/get](https://iriscrm.com/api/#/paths/~1subscriptions~1sample~1turboapp.submitted/get)     #### Created:   * Added new subscriptions for \"turboapp.approved\" event. **Link:** [#/paths/~1subscriptions~1sample~1turboapp.approved/get](https://iriscrm.com/api/#/paths/~1subscriptions~1sample~1turboapp.approved/get)   * Added new subscriptions for \"turboapp.rejected\" event. **Link:** [#/paths/~1subscriptions~1sample~1turboapp.rejected/get](https://iriscrm.com/api/#/paths/~1subscriptions~1sample~1turboapp.rejected/get)       ### 1.3.0 (2019-10-25)   #### Updated:   * Added a `group` parameter to 'lead statuses' endpoint. **Link:** [#/paths/~1leads~1statuses/get](https://iriscrm.com/api/#/paths/~1leads~1statuses/get)   * Added a `status` parameter to 'lead groups' endpoint. **Link:** [#/paths/~1leads~1groups/get](https://iriscrm.com/api/#/paths/~1leads~1groups/get)       ### 1.2.2 (2019-10-25)   #### Updated:   * Added a `per_page` property to all list endpoints.       ### 1.2.1 (2019-10-25)   #### Updated:   * Added a `leads` property to merchants endpoint. **Link:** [#/paths/~1merchants/get](https://iriscrm.com/api/#/paths/~1merchants/get)       ### 1.2.0 (2019-10-23)   #### Updated:   * The endpoint for creating API subscriptions has been updated. Status based options have been added to some events. **Link:** [#/paths/~1subscriptions/post](https://iriscrm.com/api/#/paths/~1subscriptions/post)   * The endpoint for updating API subscriptions has been updated. Status based options have been added to some events. **Link:** [#/paths/~1subscriptions~1{subscriptionId}/patch](https://iriscrm.com/api/#/paths/~1subscriptions~1{subscriptionId}/patch)       ### 1.1.0 (2019-10-23)   #### Created:   * Added an endpoint for getting SMS templates. **Link:** [#/paths/~1leads~1sms~1templates/get](https://iriscrm.com/api/#/paths/~1leads~1sms~1templates/get)   * Added new subscriptions for \"application.created\" event. **Link:** [#/paths/~1subscriptions~1sample~1application.created/get](https://iriscrm.com/api/#/paths/~1subscriptions~1sample~1application.created/get)   * Added new subscriptions for \"application.updated\" event. **Link:** [#/paths/~1subscriptions~1sample~1application.updated/get](https://iriscrm.com/api/#/paths/~1subscriptions~1sample~1application.updated/get)     #### Updated:   * Added a 'sic_code' property to merchants endpoint. **Link:** [#/paths/~1merchants/get](https://iriscrm.com/api/#/paths/~1merchants/get)       ### 1.0.0 (2019-10-23)   #### Created:   * Improving a change log.
 *
 * OpenAPI spec version: 1.3.1
 * Contact: support@iriscrm.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.13
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * LeadsApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LeadsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation leadsApplicationsAppIdMappingsGet
     *
     * Get a list of available application field mappings
     *
     * @param  int $app_id Application Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20038
     */
    public function leadsApplicationsAppIdMappingsGet($app_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsApplicationsAppIdMappingsGetWithHttpInfo($app_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsApplicationsAppIdMappingsGetWithHttpInfo
     *
     * Get a list of available application field mappings
     *
     * @param  int $app_id Application Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20038, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsApplicationsAppIdMappingsGetWithHttpInfo($app_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20038';
        $request = $this->leadsApplicationsAppIdMappingsGetRequest($app_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20038',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsApplicationsAppIdMappingsGetAsync
     *
     * Get a list of available application field mappings
     *
     * @param  int $app_id Application Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsGetAsync($app_id, $page = null, $per_page = null)
    {
        return $this->leadsApplicationsAppIdMappingsGetAsyncWithHttpInfo($app_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsGetAsyncWithHttpInfo
     *
     * Get a list of available application field mappings
     *
     * @param  int $app_id Application Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsGetAsyncWithHttpInfo($app_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20038';
        $request = $this->leadsApplicationsAppIdMappingsGetRequest($app_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsApplicationsAppIdMappingsGet'
     *
     * @param  int $app_id Application Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsApplicationsAppIdMappingsGetRequest($app_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'app_id' is set
        if ($app_id === null || (is_array($app_id) && count($app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app_id when calling leadsApplicationsAppIdMappingsGet'
            );
        }

        $resourcePath = '/leads/applications/{appId}/mappings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($app_id !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                ObjectSerializer::toPathValue($app_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdDelete
     *
     * Delete an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20039
     */
    public function leadsApplicationsAppIdMappingsMapIdDelete($app_id, $map_id)
    {
        list($response) = $this->leadsApplicationsAppIdMappingsMapIdDeleteWithHttpInfo($app_id, $map_id);
        return $response;
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdDeleteWithHttpInfo
     *
     * Delete an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20039, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsApplicationsAppIdMappingsMapIdDeleteWithHttpInfo($app_id, $map_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20039';
        $request = $this->leadsApplicationsAppIdMappingsMapIdDeleteRequest($app_id, $map_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20039',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdDeleteAsync
     *
     * Delete an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsMapIdDeleteAsync($app_id, $map_id)
    {
        return $this->leadsApplicationsAppIdMappingsMapIdDeleteAsyncWithHttpInfo($app_id, $map_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdDeleteAsyncWithHttpInfo
     *
     * Delete an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsMapIdDeleteAsyncWithHttpInfo($app_id, $map_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20039';
        $request = $this->leadsApplicationsAppIdMappingsMapIdDeleteRequest($app_id, $map_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsApplicationsAppIdMappingsMapIdDelete'
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsApplicationsAppIdMappingsMapIdDeleteRequest($app_id, $map_id)
    {
        // verify the required parameter 'app_id' is set
        if ($app_id === null || (is_array($app_id) && count($app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app_id when calling leadsApplicationsAppIdMappingsMapIdDelete'
            );
        }
        // verify the required parameter 'map_id' is set
        if ($map_id === null || (is_array($map_id) && count($map_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $map_id when calling leadsApplicationsAppIdMappingsMapIdDelete'
            );
        }

        $resourcePath = '/leads/applications/{appId}/mappings/{mapId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($app_id !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                ObjectSerializer::toPathValue($app_id),
                $resourcePath
            );
        }
        // path params
        if ($map_id !== null) {
            $resourcePath = str_replace(
                '{' . 'mapId' . '}',
                ObjectSerializer::toPathValue($map_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdGet
     *
     * Get a application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApplicationField
     */
    public function leadsApplicationsAppIdMappingsMapIdGet($app_id, $map_id)
    {
        list($response) = $this->leadsApplicationsAppIdMappingsMapIdGetWithHttpInfo($app_id, $map_id);
        return $response;
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdGetWithHttpInfo
     *
     * Get a application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApplicationField, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsApplicationsAppIdMappingsMapIdGetWithHttpInfo($app_id, $map_id)
    {
        $returnType = '\Swagger\Client\Model\ApplicationField';
        $request = $this->leadsApplicationsAppIdMappingsMapIdGetRequest($app_id, $map_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ApplicationField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdGetAsync
     *
     * Get a application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsMapIdGetAsync($app_id, $map_id)
    {
        return $this->leadsApplicationsAppIdMappingsMapIdGetAsyncWithHttpInfo($app_id, $map_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdGetAsyncWithHttpInfo
     *
     * Get a application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsMapIdGetAsyncWithHttpInfo($app_id, $map_id)
    {
        $returnType = '\Swagger\Client\Model\ApplicationField';
        $request = $this->leadsApplicationsAppIdMappingsMapIdGetRequest($app_id, $map_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsApplicationsAppIdMappingsMapIdGet'
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsApplicationsAppIdMappingsMapIdGetRequest($app_id, $map_id)
    {
        // verify the required parameter 'app_id' is set
        if ($app_id === null || (is_array($app_id) && count($app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app_id when calling leadsApplicationsAppIdMappingsMapIdGet'
            );
        }
        // verify the required parameter 'map_id' is set
        if ($map_id === null || (is_array($map_id) && count($map_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $map_id when calling leadsApplicationsAppIdMappingsMapIdGet'
            );
        }

        $resourcePath = '/leads/applications/{appId}/mappings/{mapId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($app_id !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                ObjectSerializer::toPathValue($app_id),
                $resourcePath
            );
        }
        // path params
        if ($map_id !== null) {
            $resourcePath = str_replace(
                '{' . 'mapId' . '}',
                ObjectSerializer::toPathValue($map_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdPatch
     *
     * Update an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApplicationField
     */
    public function leadsApplicationsAppIdMappingsMapIdPatch($app_id, $map_id, $body = null)
    {
        list($response) = $this->leadsApplicationsAppIdMappingsMapIdPatchWithHttpInfo($app_id, $map_id, $body);
        return $response;
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdPatchWithHttpInfo
     *
     * Update an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApplicationField, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsApplicationsAppIdMappingsMapIdPatchWithHttpInfo($app_id, $map_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ApplicationField';
        $request = $this->leadsApplicationsAppIdMappingsMapIdPatchRequest($app_id, $map_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ApplicationField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdPatchAsync
     *
     * Update an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsMapIdPatchAsync($app_id, $map_id, $body = null)
    {
        return $this->leadsApplicationsAppIdMappingsMapIdPatchAsyncWithHttpInfo($app_id, $map_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsMapIdPatchAsyncWithHttpInfo
     *
     * Update an application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsMapIdPatchAsyncWithHttpInfo($app_id, $map_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ApplicationField';
        $request = $this->leadsApplicationsAppIdMappingsMapIdPatchRequest($app_id, $map_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsApplicationsAppIdMappingsMapIdPatch'
     *
     * @param  int $app_id Application Id (required)
     * @param  int $map_id Mapping Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsApplicationsAppIdMappingsMapIdPatchRequest($app_id, $map_id, $body = null)
    {
        // verify the required parameter 'app_id' is set
        if ($app_id === null || (is_array($app_id) && count($app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app_id when calling leadsApplicationsAppIdMappingsMapIdPatch'
            );
        }
        // verify the required parameter 'map_id' is set
        if ($map_id === null || (is_array($map_id) && count($map_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $map_id when calling leadsApplicationsAppIdMappingsMapIdPatch'
            );
        }

        $resourcePath = '/leads/applications/{appId}/mappings/{mapId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($app_id !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                ObjectSerializer::toPathValue($app_id),
                $resourcePath
            );
        }
        // path params
        if ($map_id !== null) {
            $resourcePath = str_replace(
                '{' . 'mapId' . '}',
                ObjectSerializer::toPathValue($map_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsPost
     *
     * Create a new application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApplicationField
     */
    public function leadsApplicationsAppIdMappingsPost($app_id, $body = null)
    {
        list($response) = $this->leadsApplicationsAppIdMappingsPostWithHttpInfo($app_id, $body);
        return $response;
    }

    /**
     * Operation leadsApplicationsAppIdMappingsPostWithHttpInfo
     *
     * Create a new application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApplicationField, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsApplicationsAppIdMappingsPostWithHttpInfo($app_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ApplicationField';
        $request = $this->leadsApplicationsAppIdMappingsPostRequest($app_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ApplicationField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsApplicationsAppIdMappingsPostAsync
     *
     * Create a new application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsPostAsync($app_id, $body = null)
    {
        return $this->leadsApplicationsAppIdMappingsPostAsyncWithHttpInfo($app_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsApplicationsAppIdMappingsPostAsyncWithHttpInfo
     *
     * Create a new application field mapping
     *
     * @param  int $app_id Application Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsAppIdMappingsPostAsyncWithHttpInfo($app_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ApplicationField';
        $request = $this->leadsApplicationsAppIdMappingsPostRequest($app_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsApplicationsAppIdMappingsPost'
     *
     * @param  int $app_id Application Id (required)
     * @param  \Swagger\Client\Model\ApplicationField $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsApplicationsAppIdMappingsPostRequest($app_id, $body = null)
    {
        // verify the required parameter 'app_id' is set
        if ($app_id === null || (is_array($app_id) && count($app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $app_id when calling leadsApplicationsAppIdMappingsPost'
            );
        }

        $resourcePath = '/leads/applications/{appId}/mappings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($app_id !== null) {
            $resourcePath = str_replace(
                '{' . 'appId' . '}',
                ObjectSerializer::toPathValue($app_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsApplicationsGet
     *
     * Get a list of available applications
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\BriefApplicationInfo[]
     */
    public function leadsApplicationsGet()
    {
        list($response) = $this->leadsApplicationsGetWithHttpInfo();
        return $response;
    }

    /**
     * Operation leadsApplicationsGetWithHttpInfo
     *
     * Get a list of available applications
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\BriefApplicationInfo[], HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsApplicationsGetWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\BriefApplicationInfo[]';
        $request = $this->leadsApplicationsGetRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\BriefApplicationInfo[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsApplicationsGetAsync
     *
     * Get a list of available applications
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsGetAsync()
    {
        return $this->leadsApplicationsGetAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsApplicationsGetAsyncWithHttpInfo
     *
     * Get a list of available applications
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsApplicationsGetAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\BriefApplicationInfo[]';
        $request = $this->leadsApplicationsGetRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsApplicationsGet'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsApplicationsGetRequest()
    {

        $resourcePath = '/leads/applications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsCampaignsGet
     *
     * Get a list of available campaigns
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20040
     */
    public function leadsCampaignsGet()
    {
        list($response) = $this->leadsCampaignsGetWithHttpInfo();
        return $response;
    }

    /**
     * Operation leadsCampaignsGetWithHttpInfo
     *
     * Get a list of available campaigns
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20040, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsCampaignsGetWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20040';
        $request = $this->leadsCampaignsGetRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20040',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsCampaignsGetAsync
     *
     * Get a list of available campaigns
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsCampaignsGetAsync()
    {
        return $this->leadsCampaignsGetAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsCampaignsGetAsyncWithHttpInfo
     *
     * Get a list of available campaigns
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsCampaignsGetAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20040';
        $request = $this->leadsCampaignsGetRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsCampaignsGet'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsCampaignsGetRequest()
    {

        $resourcePath = '/leads/campaigns';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsEmailsTemplatesGet
     *
     * Get list of email templates
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20029
     */
    public function leadsEmailsTemplatesGet()
    {
        list($response) = $this->leadsEmailsTemplatesGetWithHttpInfo();
        return $response;
    }

    /**
     * Operation leadsEmailsTemplatesGetWithHttpInfo
     *
     * Get list of email templates
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20029, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsEmailsTemplatesGetWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20029';
        $request = $this->leadsEmailsTemplatesGetRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20029',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsEmailsTemplatesGetAsync
     *
     * Get list of email templates
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsEmailsTemplatesGetAsync()
    {
        return $this->leadsEmailsTemplatesGetAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsEmailsTemplatesGetAsyncWithHttpInfo
     *
     * Get list of email templates
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsEmailsTemplatesGetAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20029';
        $request = $this->leadsEmailsTemplatesGetRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsEmailsTemplatesGet'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsEmailsTemplatesGetRequest()
    {

        $resourcePath = '/leads/emails/templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsFieldIdGet
     *
     * Get a lead field
     *
     * @param  int $field_id Field Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\LeadField
     */
    public function leadsFieldsFieldIdGet($field_id)
    {
        list($response) = $this->leadsFieldsFieldIdGetWithHttpInfo($field_id);
        return $response;
    }

    /**
     * Operation leadsFieldsFieldIdGetWithHttpInfo
     *
     * Get a lead field
     *
     * @param  int $field_id Field Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\LeadField, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsFieldIdGetWithHttpInfo($field_id)
    {
        $returnType = '\Swagger\Client\Model\LeadField';
        $request = $this->leadsFieldsFieldIdGetRequest($field_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\LeadField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsFieldIdGetAsync
     *
     * Get a lead field
     *
     * @param  int $field_id Field Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsFieldIdGetAsync($field_id)
    {
        return $this->leadsFieldsFieldIdGetAsyncWithHttpInfo($field_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsFieldIdGetAsyncWithHttpInfo
     *
     * Get a lead field
     *
     * @param  int $field_id Field Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsFieldIdGetAsyncWithHttpInfo($field_id)
    {
        $returnType = '\Swagger\Client\Model\LeadField';
        $request = $this->leadsFieldsFieldIdGetRequest($field_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsFieldIdGet'
     *
     * @param  int $field_id Field Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsFieldIdGetRequest($field_id)
    {
        // verify the required parameter 'field_id' is set
        if ($field_id === null || (is_array($field_id) && count($field_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $field_id when calling leadsFieldsFieldIdGet'
            );
        }

        $resourcePath = '/leads/fields/{fieldId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($field_id !== null) {
            $resourcePath = str_replace(
                '{' . 'fieldId' . '}',
                ObjectSerializer::toPathValue($field_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsFieldIdOrderPatch
     *
     * Update a lead field order position
     *
     * @param  int $field_id Field Id (required)
     * @param  \Swagger\Client\Model\LeadFieldOrder $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20012
     */
    public function leadsFieldsFieldIdOrderPatch($field_id, $body = null)
    {
        list($response) = $this->leadsFieldsFieldIdOrderPatchWithHttpInfo($field_id, $body);
        return $response;
    }

    /**
     * Operation leadsFieldsFieldIdOrderPatchWithHttpInfo
     *
     * Update a lead field order position
     *
     * @param  int $field_id Field Id (required)
     * @param  \Swagger\Client\Model\LeadFieldOrder $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsFieldIdOrderPatchWithHttpInfo($field_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20012';
        $request = $this->leadsFieldsFieldIdOrderPatchRequest($field_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20012',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsFieldIdOrderPatchAsync
     *
     * Update a lead field order position
     *
     * @param  int $field_id Field Id (required)
     * @param  \Swagger\Client\Model\LeadFieldOrder $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsFieldIdOrderPatchAsync($field_id, $body = null)
    {
        return $this->leadsFieldsFieldIdOrderPatchAsyncWithHttpInfo($field_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsFieldIdOrderPatchAsyncWithHttpInfo
     *
     * Update a lead field order position
     *
     * @param  int $field_id Field Id (required)
     * @param  \Swagger\Client\Model\LeadFieldOrder $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsFieldIdOrderPatchAsyncWithHttpInfo($field_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20012';
        $request = $this->leadsFieldsFieldIdOrderPatchRequest($field_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsFieldIdOrderPatch'
     *
     * @param  int $field_id Field Id (required)
     * @param  \Swagger\Client\Model\LeadFieldOrder $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsFieldIdOrderPatchRequest($field_id, $body = null)
    {
        // verify the required parameter 'field_id' is set
        if ($field_id === null || (is_array($field_id) && count($field_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $field_id when calling leadsFieldsFieldIdOrderPatch'
            );
        }

        $resourcePath = '/leads/fields/{fieldId}/order';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($field_id !== null) {
            $resourcePath = str_replace(
                '{' . 'fieldId' . '}',
                ObjectSerializer::toPathValue($field_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsFieldIdPatch
     *
     * Update a lead field
     *
     * @param  int $field_id Field Id (required)
     * @param   $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\LeadField
     */
    public function leadsFieldsFieldIdPatch($field_id, $body = null)
    {
        list($response) = $this->leadsFieldsFieldIdPatchWithHttpInfo($field_id, $body);
        return $response;
    }

    /**
     * Operation leadsFieldsFieldIdPatchWithHttpInfo
     *
     * Update a lead field
     *
     * @param  int $field_id Field Id (required)
     * @param   $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\LeadField, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsFieldIdPatchWithHttpInfo($field_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadField';
        $request = $this->leadsFieldsFieldIdPatchRequest($field_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\LeadField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsFieldIdPatchAsync
     *
     * Update a lead field
     *
     * @param  int $field_id Field Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsFieldIdPatchAsync($field_id, $body = null)
    {
        return $this->leadsFieldsFieldIdPatchAsyncWithHttpInfo($field_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsFieldIdPatchAsyncWithHttpInfo
     *
     * Update a lead field
     *
     * @param  int $field_id Field Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsFieldIdPatchAsyncWithHttpInfo($field_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadField';
        $request = $this->leadsFieldsFieldIdPatchRequest($field_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsFieldIdPatch'
     *
     * @param  int $field_id Field Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsFieldIdPatchRequest($field_id, $body = null)
    {
        // verify the required parameter 'field_id' is set
        if ($field_id === null || (is_array($field_id) && count($field_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $field_id when calling leadsFieldsFieldIdPatch'
            );
        }

        $resourcePath = '/leads/fields/{fieldId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($field_id !== null) {
            $resourcePath = str_replace(
                '{' . 'fieldId' . '}',
                ObjectSerializer::toPathValue($field_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsGet
     *
     * Get a list of available lead fields
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20011
     */
    public function leadsFieldsGet($page = null, $per_page = null)
    {
        list($response) = $this->leadsFieldsGetWithHttpInfo($page, $per_page);
        return $response;
    }

    /**
     * Operation leadsFieldsGetWithHttpInfo
     *
     * Get a list of available lead fields
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20011, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsGetWithHttpInfo($page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20011';
        $request = $this->leadsFieldsGetRequest($page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20011',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsGetAsync
     *
     * Get a list of available lead fields
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsGetAsync($page = null, $per_page = null)
    {
        return $this->leadsFieldsGetAsyncWithHttpInfo($page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsGetAsyncWithHttpInfo
     *
     * Get a list of available lead fields
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsGetAsyncWithHttpInfo($page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20011';
        $request = $this->leadsFieldsGetRequest($page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsGet'
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsGetRequest($page = null, $per_page = null)
    {

        $resourcePath = '/leads/fields';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsPost
     *
     * Create a new lead field
     *
     * @param   $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\LeadField
     */
    public function leadsFieldsPost($body = null)
    {
        list($response) = $this->leadsFieldsPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation leadsFieldsPostWithHttpInfo
     *
     * Create a new lead field
     *
     * @param   $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\LeadField, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsPostWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadField';
        $request = $this->leadsFieldsPostRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\LeadField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsPostAsync
     *
     * Create a new lead field
     *
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsPostAsync($body = null)
    {
        return $this->leadsFieldsPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsPostAsyncWithHttpInfo
     *
     * Create a new lead field
     *
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsPostAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadField';
        $request = $this->leadsFieldsPostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsPost'
     *
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsPostRequest($body = null)
    {

        $resourcePath = '/leads/fields';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsTabsGet
     *
     * Get a list of all lead field tabs
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20013
     */
    public function leadsFieldsTabsGet($page = null, $per_page = null)
    {
        list($response) = $this->leadsFieldsTabsGetWithHttpInfo($page, $per_page);
        return $response;
    }

    /**
     * Operation leadsFieldsTabsGetWithHttpInfo
     *
     * Get a list of all lead field tabs
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20013, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsTabsGetWithHttpInfo($page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20013';
        $request = $this->leadsFieldsTabsGetRequest($page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20013',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsTabsGetAsync
     *
     * Get a list of all lead field tabs
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsGetAsync($page = null, $per_page = null)
    {
        return $this->leadsFieldsTabsGetAsyncWithHttpInfo($page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsTabsGetAsyncWithHttpInfo
     *
     * Get a list of all lead field tabs
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsGetAsyncWithHttpInfo($page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20013';
        $request = $this->leadsFieldsTabsGetRequest($page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsTabsGet'
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsTabsGetRequest($page = null, $per_page = null)
    {

        $resourcePath = '/leads/fields/tabs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsTabsPost
     *
     * Create a lead field tab
     *
     * @param  \Swagger\Client\Model\LeadFieldTab $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\LeadFieldTab
     */
    public function leadsFieldsTabsPost($body = null)
    {
        list($response) = $this->leadsFieldsTabsPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation leadsFieldsTabsPostWithHttpInfo
     *
     * Create a lead field tab
     *
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\LeadFieldTab, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsTabsPostWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadFieldTab';
        $request = $this->leadsFieldsTabsPostRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\LeadFieldTab',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsTabsPostAsync
     *
     * Create a lead field tab
     *
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsPostAsync($body = null)
    {
        return $this->leadsFieldsTabsPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsTabsPostAsyncWithHttpInfo
     *
     * Create a lead field tab
     *
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsPostAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadFieldTab';
        $request = $this->leadsFieldsTabsPostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsTabsPost'
     *
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsTabsPostRequest($body = null)
    {

        $resourcePath = '/leads/fields/tabs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsTabsTabIdGet
     *
     * Get a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\LeadFieldTab
     */
    public function leadsFieldsTabsTabIdGet($tab_id)
    {
        list($response) = $this->leadsFieldsTabsTabIdGetWithHttpInfo($tab_id);
        return $response;
    }

    /**
     * Operation leadsFieldsTabsTabIdGetWithHttpInfo
     *
     * Get a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\LeadFieldTab, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsTabsTabIdGetWithHttpInfo($tab_id)
    {
        $returnType = '\Swagger\Client\Model\LeadFieldTab';
        $request = $this->leadsFieldsTabsTabIdGetRequest($tab_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\LeadFieldTab',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsTabsTabIdGetAsync
     *
     * Get a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsTabIdGetAsync($tab_id)
    {
        return $this->leadsFieldsTabsTabIdGetAsyncWithHttpInfo($tab_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsTabsTabIdGetAsyncWithHttpInfo
     *
     * Get a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsTabIdGetAsyncWithHttpInfo($tab_id)
    {
        $returnType = '\Swagger\Client\Model\LeadFieldTab';
        $request = $this->leadsFieldsTabsTabIdGetRequest($tab_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsTabsTabIdGet'
     *
     * @param  int $tab_id Lead field tab Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsTabsTabIdGetRequest($tab_id)
    {
        // verify the required parameter 'tab_id' is set
        if ($tab_id === null || (is_array($tab_id) && count($tab_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tab_id when calling leadsFieldsTabsTabIdGet'
            );
        }

        $resourcePath = '/leads/fields/tabs/{tabId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($tab_id !== null) {
            $resourcePath = str_replace(
                '{' . 'tabId' . '}',
                ObjectSerializer::toPathValue($tab_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsFieldsTabsTabIdPatch
     *
     * Update a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     * @param  \Swagger\Client\Model\LeadFieldTab $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\LeadFieldTab
     */
    public function leadsFieldsTabsTabIdPatch($tab_id, $body = null)
    {
        list($response) = $this->leadsFieldsTabsTabIdPatchWithHttpInfo($tab_id, $body);
        return $response;
    }

    /**
     * Operation leadsFieldsTabsTabIdPatchWithHttpInfo
     *
     * Update a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\LeadFieldTab, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsFieldsTabsTabIdPatchWithHttpInfo($tab_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadFieldTab';
        $request = $this->leadsFieldsTabsTabIdPatchRequest($tab_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\LeadFieldTab',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsFieldsTabsTabIdPatchAsync
     *
     * Update a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsTabIdPatchAsync($tab_id, $body = null)
    {
        return $this->leadsFieldsTabsTabIdPatchAsyncWithHttpInfo($tab_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsFieldsTabsTabIdPatchAsyncWithHttpInfo
     *
     * Update a lead field tab
     *
     * @param  int $tab_id Lead field tab Id (required)
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsFieldsTabsTabIdPatchAsyncWithHttpInfo($tab_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\LeadFieldTab';
        $request = $this->leadsFieldsTabsTabIdPatchRequest($tab_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsFieldsTabsTabIdPatch'
     *
     * @param  int $tab_id Lead field tab Id (required)
     * @param  \Swagger\Client\Model\LeadFieldTab $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsFieldsTabsTabIdPatchRequest($tab_id, $body = null)
    {
        // verify the required parameter 'tab_id' is set
        if ($tab_id === null || (is_array($tab_id) && count($tab_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tab_id when calling leadsFieldsTabsTabIdPatch'
            );
        }

        $resourcePath = '/leads/fields/tabs/{tabId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($tab_id !== null) {
            $resourcePath = str_replace(
                '{' . 'tabId' . '}',
                ObjectSerializer::toPathValue($tab_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsGet
     *
     * Get a list of leads
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     * @param  string $sort_by Sorting of leads by the field value (optional)
     * @param  string $sort_dir Direction of sorting (optional)
     * @param  int $group Filter leads by a group id (optional)
     * @param  int $mid Filter leads by a merchant id (optional)
     * @param  int $campaign Filter leads by a campaign id (optional)
     * @param  int $source Filter leads by a source id (optional)
     * @param  int $status Filter leads by a status id (optional)
     * @param  int $category Filter leads by a status category id (optional)
     * @param  int $user Filter leads by a user id (optional)
     * @param  string $date_filter Filtering leads by a date range depends on this filter (optional)
     * @param  \DateTime $start_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  \DateTime $end_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  string $email Filter leads by a email (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2007
     */
    public function leadsGet($page = null, $per_page = null, $sort_by = null, $sort_dir = null, $group = null, $mid = null, $campaign = null, $source = null, $status = null, $category = null, $user = null, $date_filter = null, $start_date = null, $end_date = null, $email = null)
    {
        list($response) = $this->leadsGetWithHttpInfo($page, $per_page, $sort_by, $sort_dir, $group, $mid, $campaign, $source, $status, $category, $user, $date_filter, $start_date, $end_date, $email);
        return $response;
    }

    /**
     * Operation leadsGetWithHttpInfo
     *
     * Get a list of leads
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     * @param  string $sort_by Sorting of leads by the field value (optional)
     * @param  string $sort_dir Direction of sorting (optional)
     * @param  int $group Filter leads by a group id (optional)
     * @param  int $mid Filter leads by a merchant id (optional)
     * @param  int $campaign Filter leads by a campaign id (optional)
     * @param  int $source Filter leads by a source id (optional)
     * @param  int $status Filter leads by a status id (optional)
     * @param  int $category Filter leads by a status category id (optional)
     * @param  int $user Filter leads by a user id (optional)
     * @param  string $date_filter Filtering leads by a date range depends on this filter (optional)
     * @param  \DateTime $start_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  \DateTime $end_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  string $email Filter leads by a email (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2007, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsGetWithHttpInfo($page = null, $per_page = null, $sort_by = null, $sort_dir = null, $group = null, $mid = null, $campaign = null, $source = null, $status = null, $category = null, $user = null, $date_filter = null, $start_date = null, $end_date = null, $email = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2007';
        $request = $this->leadsGetRequest($page, $per_page, $sort_by, $sort_dir, $group, $mid, $campaign, $source, $status, $category, $user, $date_filter, $start_date, $end_date, $email);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse2007',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsGetAsync
     *
     * Get a list of leads
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     * @param  string $sort_by Sorting of leads by the field value (optional)
     * @param  string $sort_dir Direction of sorting (optional)
     * @param  int $group Filter leads by a group id (optional)
     * @param  int $mid Filter leads by a merchant id (optional)
     * @param  int $campaign Filter leads by a campaign id (optional)
     * @param  int $source Filter leads by a source id (optional)
     * @param  int $status Filter leads by a status id (optional)
     * @param  int $category Filter leads by a status category id (optional)
     * @param  int $user Filter leads by a user id (optional)
     * @param  string $date_filter Filtering leads by a date range depends on this filter (optional)
     * @param  \DateTime $start_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  \DateTime $end_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  string $email Filter leads by a email (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsGetAsync($page = null, $per_page = null, $sort_by = null, $sort_dir = null, $group = null, $mid = null, $campaign = null, $source = null, $status = null, $category = null, $user = null, $date_filter = null, $start_date = null, $end_date = null, $email = null)
    {
        return $this->leadsGetAsyncWithHttpInfo($page, $per_page, $sort_by, $sort_dir, $group, $mid, $campaign, $source, $status, $category, $user, $date_filter, $start_date, $end_date, $email)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsGetAsyncWithHttpInfo
     *
     * Get a list of leads
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     * @param  string $sort_by Sorting of leads by the field value (optional)
     * @param  string $sort_dir Direction of sorting (optional)
     * @param  int $group Filter leads by a group id (optional)
     * @param  int $mid Filter leads by a merchant id (optional)
     * @param  int $campaign Filter leads by a campaign id (optional)
     * @param  int $source Filter leads by a source id (optional)
     * @param  int $status Filter leads by a status id (optional)
     * @param  int $category Filter leads by a status category id (optional)
     * @param  int $user Filter leads by a user id (optional)
     * @param  string $date_filter Filtering leads by a date range depends on this filter (optional)
     * @param  \DateTime $start_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  \DateTime $end_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  string $email Filter leads by a email (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsGetAsyncWithHttpInfo($page = null, $per_page = null, $sort_by = null, $sort_dir = null, $group = null, $mid = null, $campaign = null, $source = null, $status = null, $category = null, $user = null, $date_filter = null, $start_date = null, $end_date = null, $email = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2007';
        $request = $this->leadsGetRequest($page, $per_page, $sort_by, $sort_dir, $group, $mid, $campaign, $source, $status, $category, $user, $date_filter, $start_date, $end_date, $email);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsGet'
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     * @param  string $sort_by Sorting of leads by the field value (optional)
     * @param  string $sort_dir Direction of sorting (optional)
     * @param  int $group Filter leads by a group id (optional)
     * @param  int $mid Filter leads by a merchant id (optional)
     * @param  int $campaign Filter leads by a campaign id (optional)
     * @param  int $source Filter leads by a source id (optional)
     * @param  int $status Filter leads by a status id (optional)
     * @param  int $category Filter leads by a status category id (optional)
     * @param  int $user Filter leads by a user id (optional)
     * @param  string $date_filter Filtering leads by a date range depends on this filter (optional)
     * @param  \DateTime $start_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  \DateTime $end_date Filter leads by a date in ISO 8601 format (Y-m-d\\TH:i:sP) (optional)
     * @param  string $email Filter leads by a email (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsGetRequest($page = null, $per_page = null, $sort_by = null, $sort_dir = null, $group = null, $mid = null, $campaign = null, $source = null, $status = null, $category = null, $user = null, $date_filter = null, $start_date = null, $end_date = null, $email = null)
    {

        $resourcePath = '/leads';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }
        // query params
        if ($sort_by !== null) {
            $queryParams['sort_by'] = ObjectSerializer::toQueryValue($sort_by);
        }
        // query params
        if ($sort_dir !== null) {
            $queryParams['sort_dir'] = ObjectSerializer::toQueryValue($sort_dir);
        }
        // query params
        if ($group !== null) {
            $queryParams['group'] = ObjectSerializer::toQueryValue($group);
        }
        // query params
        if ($mid !== null) {
            $queryParams['mid'] = ObjectSerializer::toQueryValue($mid);
        }
        // query params
        if ($campaign !== null) {
            $queryParams['campaign'] = ObjectSerializer::toQueryValue($campaign);
        }
        // query params
        if ($source !== null) {
            $queryParams['source'] = ObjectSerializer::toQueryValue($source);
        }
        // query params
        if ($status !== null) {
            $queryParams['status'] = ObjectSerializer::toQueryValue($status);
        }
        // query params
        if ($category !== null) {
            $queryParams['category'] = ObjectSerializer::toQueryValue($category);
        }
        // query params
        if ($user !== null) {
            $queryParams['user'] = ObjectSerializer::toQueryValue($user);
        }
        // query params
        if ($date_filter !== null) {
            $queryParams['date_filter'] = ObjectSerializer::toQueryValue($date_filter);
        }
        // query params
        if ($start_date !== null) {
            $queryParams['start_date'] = ObjectSerializer::toQueryValue($start_date);
        }
        // query params
        if ($end_date !== null) {
            $queryParams['end_date'] = ObjectSerializer::toQueryValue($end_date);
        }
        // query params
        if ($email !== null) {
            $queryParams['email'] = ObjectSerializer::toQueryValue($email);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsGroupsGet
     *
     * Get a list of available groups
     *
     * @param  int $status Status Id (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20041
     */
    public function leadsGroupsGet($status = null)
    {
        list($response) = $this->leadsGroupsGetWithHttpInfo($status);
        return $response;
    }

    /**
     * Operation leadsGroupsGetWithHttpInfo
     *
     * Get a list of available groups
     *
     * @param  int $status Status Id (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20041, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsGroupsGetWithHttpInfo($status = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20041';
        $request = $this->leadsGroupsGetRequest($status);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20041',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsGroupsGetAsync
     *
     * Get a list of available groups
     *
     * @param  int $status Status Id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsGroupsGetAsync($status = null)
    {
        return $this->leadsGroupsGetAsyncWithHttpInfo($status)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsGroupsGetAsyncWithHttpInfo
     *
     * Get a list of available groups
     *
     * @param  int $status Status Id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsGroupsGetAsyncWithHttpInfo($status = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20041';
        $request = $this->leadsGroupsGetRequest($status);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsGroupsGet'
     *
     * @param  int $status Status Id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsGroupsGetRequest($status = null)
    {

        $resourcePath = '/leads/groups';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($status !== null) {
            $queryParams['status'] = ObjectSerializer::toQueryValue($status);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdActivityCampaignGet
     *
     * Get a list of all lead campaign activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20032
     */
    public function leadsLeadIdActivityCampaignGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdActivityCampaignGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdActivityCampaignGetWithHttpInfo
     *
     * Get a list of all lead campaign activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20032, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdActivityCampaignGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20032';
        $request = $this->leadsLeadIdActivityCampaignGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20032',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdActivityCampaignGetAsync
     *
     * Get a list of all lead campaign activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityCampaignGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdActivityCampaignGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdActivityCampaignGetAsyncWithHttpInfo
     *
     * Get a list of all lead campaign activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityCampaignGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20032';
        $request = $this->leadsLeadIdActivityCampaignGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdActivityCampaignGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdActivityCampaignGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdActivityCampaignGet'
            );
        }

        $resourcePath = '/leads/{leadId}/activity/campaign';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdActivityDeletionGet
     *
     * Get a list of all lead deletion activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20033
     */
    public function leadsLeadIdActivityDeletionGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdActivityDeletionGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdActivityDeletionGetWithHttpInfo
     *
     * Get a list of all lead deletion activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20033, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdActivityDeletionGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20033';
        $request = $this->leadsLeadIdActivityDeletionGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20033',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdActivityDeletionGetAsync
     *
     * Get a list of all lead deletion activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityDeletionGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdActivityDeletionGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdActivityDeletionGetAsyncWithHttpInfo
     *
     * Get a list of all lead deletion activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityDeletionGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20033';
        $request = $this->leadsLeadIdActivityDeletionGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdActivityDeletionGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdActivityDeletionGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdActivityDeletionGet'
            );
        }

        $resourcePath = '/leads/{leadId}/activity/deletion';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdActivityDuplicatesGet
     *
     * Get a list of all lead duplicate activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20034
     */
    public function leadsLeadIdActivityDuplicatesGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdActivityDuplicatesGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdActivityDuplicatesGetWithHttpInfo
     *
     * Get a list of all lead duplicate activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20034, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdActivityDuplicatesGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20034';
        $request = $this->leadsLeadIdActivityDuplicatesGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20034',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdActivityDuplicatesGetAsync
     *
     * Get a list of all lead duplicate activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityDuplicatesGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdActivityDuplicatesGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdActivityDuplicatesGetAsyncWithHttpInfo
     *
     * Get a list of all lead duplicate activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityDuplicatesGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20034';
        $request = $this->leadsLeadIdActivityDuplicatesGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdActivityDuplicatesGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdActivityDuplicatesGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdActivityDuplicatesGet'
            );
        }

        $resourcePath = '/leads/{leadId}/activity/duplicates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdActivityLinksGet
     *
     * Get a list of all lead links activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20035
     */
    public function leadsLeadIdActivityLinksGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdActivityLinksGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdActivityLinksGetWithHttpInfo
     *
     * Get a list of all lead links activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20035, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdActivityLinksGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20035';
        $request = $this->leadsLeadIdActivityLinksGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20035',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdActivityLinksGetAsync
     *
     * Get a list of all lead links activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityLinksGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdActivityLinksGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdActivityLinksGetAsyncWithHttpInfo
     *
     * Get a list of all lead links activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityLinksGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20035';
        $request = $this->leadsLeadIdActivityLinksGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdActivityLinksGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdActivityLinksGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdActivityLinksGet'
            );
        }

        $resourcePath = '/leads/{leadId}/activity/links';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdActivitySourceGet
     *
     * Get a list of all lead source activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20036
     */
    public function leadsLeadIdActivitySourceGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdActivitySourceGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdActivitySourceGetWithHttpInfo
     *
     * Get a list of all lead source activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20036, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdActivitySourceGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20036';
        $request = $this->leadsLeadIdActivitySourceGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20036',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdActivitySourceGetAsync
     *
     * Get a list of all lead source activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivitySourceGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdActivitySourceGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdActivitySourceGetAsyncWithHttpInfo
     *
     * Get a list of all lead source activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivitySourceGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20036';
        $request = $this->leadsLeadIdActivitySourceGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdActivitySourceGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdActivitySourceGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdActivitySourceGet'
            );
        }

        $resourcePath = '/leads/{leadId}/activity/source';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdActivityStatusGet
     *
     * Get a list of all lead status activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20037
     */
    public function leadsLeadIdActivityStatusGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdActivityStatusGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdActivityStatusGetWithHttpInfo
     *
     * Get a list of all lead status activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20037, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdActivityStatusGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20037';
        $request = $this->leadsLeadIdActivityStatusGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20037',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdActivityStatusGetAsync
     *
     * Get a list of all lead status activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityStatusGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdActivityStatusGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdActivityStatusGetAsyncWithHttpInfo
     *
     * Get a list of all lead status activity
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdActivityStatusGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20037';
        $request = $this->leadsLeadIdActivityStatusGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdActivityStatusGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdActivityStatusGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdActivityStatusGet'
            );
        }

        $resourcePath = '/leads/{leadId}/activity/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdApplicationsApplicationIdPopulatePost
     *
     * Populate PDF Document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20018
     */
    public function leadsLeadIdApplicationsApplicationIdPopulatePost($lead_id, $application_id)
    {
        list($response) = $this->leadsLeadIdApplicationsApplicationIdPopulatePostWithHttpInfo($lead_id, $application_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdApplicationsApplicationIdPopulatePostWithHttpInfo
     *
     * Populate PDF Document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20018, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdApplicationsApplicationIdPopulatePostWithHttpInfo($lead_id, $application_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20018';
        $request = $this->leadsLeadIdApplicationsApplicationIdPopulatePostRequest($lead_id, $application_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20018',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdApplicationsApplicationIdPopulatePostAsync
     *
     * Populate PDF Document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdApplicationsApplicationIdPopulatePostAsync($lead_id, $application_id)
    {
        return $this->leadsLeadIdApplicationsApplicationIdPopulatePostAsyncWithHttpInfo($lead_id, $application_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdApplicationsApplicationIdPopulatePostAsyncWithHttpInfo
     *
     * Populate PDF Document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdApplicationsApplicationIdPopulatePostAsyncWithHttpInfo($lead_id, $application_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20018';
        $request = $this->leadsLeadIdApplicationsApplicationIdPopulatePostRequest($lead_id, $application_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdApplicationsApplicationIdPopulatePost'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdApplicationsApplicationIdPopulatePostRequest($lead_id, $application_id)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdApplicationsApplicationIdPopulatePost'
            );
        }
        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling leadsLeadIdApplicationsApplicationIdPopulatePost'
            );
        }

        $resourcePath = '/leads/{leadId}/applications/{applicationId}/populate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($application_id !== null) {
            $resourcePath = str_replace(
                '{' . 'applicationId' . '}',
                ObjectSerializer::toPathValue($application_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdAppointmentsGet
     *
     * Get lead appointments
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20016
     */
    public function leadsLeadIdAppointmentsGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdAppointmentsGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdAppointmentsGetWithHttpInfo
     *
     * Get lead appointments
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20016, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdAppointmentsGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20016';
        $request = $this->leadsLeadIdAppointmentsGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20016',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdAppointmentsGetAsync
     *
     * Get lead appointments
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdAppointmentsGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdAppointmentsGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdAppointmentsGetAsyncWithHttpInfo
     *
     * Get lead appointments
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdAppointmentsGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20016';
        $request = $this->leadsLeadIdAppointmentsGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdAppointmentsGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdAppointmentsGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdAppointmentsGet'
            );
        }

        $resourcePath = '/leads/{leadId}/appointments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdAppointmentsPost
     *
     * Create a lead appointment
     *
     * @param  \Swagger\Client\Model\Body4 $body Create a lead appointment (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20017
     */
    public function leadsLeadIdAppointmentsPost($body, $lead_id)
    {
        list($response) = $this->leadsLeadIdAppointmentsPostWithHttpInfo($body, $lead_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdAppointmentsPostWithHttpInfo
     *
     * Create a lead appointment
     *
     * @param  \Swagger\Client\Model\Body4 $body Create a lead appointment (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20017, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdAppointmentsPostWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20017';
        $request = $this->leadsLeadIdAppointmentsPostRequest($body, $lead_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20017',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdAppointmentsPostAsync
     *
     * Create a lead appointment
     *
     * @param  \Swagger\Client\Model\Body4 $body Create a lead appointment (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdAppointmentsPostAsync($body, $lead_id)
    {
        return $this->leadsLeadIdAppointmentsPostAsyncWithHttpInfo($body, $lead_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdAppointmentsPostAsyncWithHttpInfo
     *
     * Create a lead appointment
     *
     * @param  \Swagger\Client\Model\Body4 $body Create a lead appointment (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdAppointmentsPostAsyncWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20017';
        $request = $this->leadsLeadIdAppointmentsPostRequest($body, $lead_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdAppointmentsPost'
     *
     * @param  \Swagger\Client\Model\Body4 $body Create a lead appointment (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdAppointmentsPostRequest($body, $lead_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling leadsLeadIdAppointmentsPost'
            );
        }
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdAppointmentsPost'
            );
        }

        $resourcePath = '/leads/{leadId}/appointments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdDocumentsDocumentIdGet
     *
     * Download a document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $document_id Document Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function leadsLeadIdDocumentsDocumentIdGet($lead_id, $document_id)
    {
        list($response) = $this->leadsLeadIdDocumentsDocumentIdGetWithHttpInfo($lead_id, $document_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdDocumentsDocumentIdGetWithHttpInfo
     *
     * Download a document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $document_id Document Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdDocumentsDocumentIdGetWithHttpInfo($lead_id, $document_id)
    {
        $returnType = 'string';
        $request = $this->leadsLeadIdDocumentsDocumentIdGetRequest($lead_id, $document_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdDocumentsDocumentIdGetAsync
     *
     * Download a document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $document_id Document Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdDocumentsDocumentIdGetAsync($lead_id, $document_id)
    {
        return $this->leadsLeadIdDocumentsDocumentIdGetAsyncWithHttpInfo($lead_id, $document_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdDocumentsDocumentIdGetAsyncWithHttpInfo
     *
     * Download a document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $document_id Document Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdDocumentsDocumentIdGetAsyncWithHttpInfo($lead_id, $document_id)
    {
        $returnType = 'string';
        $request = $this->leadsLeadIdDocumentsDocumentIdGetRequest($lead_id, $document_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdDocumentsDocumentIdGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $document_id Document Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdDocumentsDocumentIdGetRequest($lead_id, $document_id)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdDocumentsDocumentIdGet'
            );
        }
        // verify the required parameter 'document_id' is set
        if ($document_id === null || (is_array($document_id) && count($document_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $document_id when calling leadsLeadIdDocumentsDocumentIdGet'
            );
        }

        $resourcePath = '/leads/{leadId}/documents/{documentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($document_id !== null) {
            $resourcePath = str_replace(
                '{' . 'documentId' . '}',
                ObjectSerializer::toPathValue($document_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream', 'application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdDocumentsGet
     *
     * Get a list of available documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20024
     */
    public function leadsLeadIdDocumentsGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdDocumentsGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdDocumentsGetWithHttpInfo
     *
     * Get a list of available documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20024, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdDocumentsGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20024';
        $request = $this->leadsLeadIdDocumentsGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20024',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdDocumentsGetAsync
     *
     * Get a list of available documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdDocumentsGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdDocumentsGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdDocumentsGetAsyncWithHttpInfo
     *
     * Get a list of available documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdDocumentsGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20024';
        $request = $this->leadsLeadIdDocumentsGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdDocumentsGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdDocumentsGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdDocumentsGet'
            );
        }

        $resourcePath = '/leads/{leadId}/documents';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdDocumentsPost
     *
     * Upload a document
     *
     * @param  int $tab Tab Id (required)
     * @param  int $label Label Id (required)
     * @param  string $filename File name (required)
     * @param  int $lead_id Lead Id (required)
     * @param  Object $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function leadsLeadIdDocumentsPost($tab, $label, $filename, $lead_id, $body = null)
    {
        list($response) = $this->leadsLeadIdDocumentsPostWithHttpInfo($tab, $label, $filename, $lead_id, $body);
        return $response;
    }

    /**
     * Operation leadsLeadIdDocumentsPostWithHttpInfo
     *
     * Upload a document
     *
     * @param  int $tab Tab Id (required)
     * @param  int $label Label Id (required)
     * @param  string $filename File name (required)
     * @param  int $lead_id Lead Id (required)
     * @param  Object $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdDocumentsPostWithHttpInfo($tab, $label, $filename, $lead_id, $body = null)
    {
        $returnType = 'string';
        $request = $this->leadsLeadIdDocumentsPostRequest($tab, $label, $filename, $lead_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdDocumentsPostAsync
     *
     * Upload a document
     *
     * @param  int $tab Tab Id (required)
     * @param  int $label Label Id (required)
     * @param  string $filename File name (required)
     * @param  int $lead_id Lead Id (required)
     * @param  Object $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdDocumentsPostAsync($tab, $label, $filename, $lead_id, $body = null)
    {
        return $this->leadsLeadIdDocumentsPostAsyncWithHttpInfo($tab, $label, $filename, $lead_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdDocumentsPostAsyncWithHttpInfo
     *
     * Upload a document
     *
     * @param  int $tab Tab Id (required)
     * @param  int $label Label Id (required)
     * @param  string $filename File name (required)
     * @param  int $lead_id Lead Id (required)
     * @param  Object $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdDocumentsPostAsyncWithHttpInfo($tab, $label, $filename, $lead_id, $body = null)
    {
        $returnType = 'string';
        $request = $this->leadsLeadIdDocumentsPostRequest($tab, $label, $filename, $lead_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdDocumentsPost'
     *
     * @param  int $tab Tab Id (required)
     * @param  int $label Label Id (required)
     * @param  string $filename File name (required)
     * @param  int $lead_id Lead Id (required)
     * @param  Object $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdDocumentsPostRequest($tab, $label, $filename, $lead_id, $body = null)
    {
        // verify the required parameter 'tab' is set
        if ($tab === null || (is_array($tab) && count($tab) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tab when calling leadsLeadIdDocumentsPost'
            );
        }
        // verify the required parameter 'label' is set
        if ($label === null || (is_array($label) && count($label) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $label when calling leadsLeadIdDocumentsPost'
            );
        }
        // verify the required parameter 'filename' is set
        if ($filename === null || (is_array($filename) && count($filename) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $filename when calling leadsLeadIdDocumentsPost'
            );
        }
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdDocumentsPost'
            );
        }

        $resourcePath = '/leads/{leadId}/documents';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($tab !== null) {
            $queryParams['tab'] = ObjectSerializer::toQueryValue($tab);
        }
        // query params
        if ($label !== null) {
            $queryParams['label'] = ObjectSerializer::toQueryValue($label);
        }
        // query params
        if ($filename !== null) {
            $queryParams['filename'] = ObjectSerializer::toQueryValue($filename);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['text/plain', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['text/plain', 'application/json'],
                ['application/octet-stream']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdEmailsTemplateIdPost
     *
     * Send an email to lead with template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20028
     */
    public function leadsLeadIdEmailsTemplateIdPost($lead_id, $template_id, $body = null)
    {
        list($response) = $this->leadsLeadIdEmailsTemplateIdPostWithHttpInfo($lead_id, $template_id, $body);
        return $response;
    }

    /**
     * Operation leadsLeadIdEmailsTemplateIdPostWithHttpInfo
     *
     * Send an email to lead with template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20028, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdEmailsTemplateIdPostWithHttpInfo($lead_id, $template_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20028';
        $request = $this->leadsLeadIdEmailsTemplateIdPostRequest($lead_id, $template_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20028',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdEmailsTemplateIdPostAsync
     *
     * Send an email to lead with template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdEmailsTemplateIdPostAsync($lead_id, $template_id, $body = null)
    {
        return $this->leadsLeadIdEmailsTemplateIdPostAsyncWithHttpInfo($lead_id, $template_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdEmailsTemplateIdPostAsyncWithHttpInfo
     *
     * Send an email to lead with template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdEmailsTemplateIdPostAsyncWithHttpInfo($lead_id, $template_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20028';
        $request = $this->leadsLeadIdEmailsTemplateIdPostRequest($lead_id, $template_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdEmailsTemplateIdPost'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdEmailsTemplateIdPostRequest($lead_id, $template_id, $body = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdEmailsTemplateIdPost'
            );
        }
        // verify the required parameter 'template_id' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling leadsLeadIdEmailsTemplateIdPost'
            );
        }

        $resourcePath = '/leads/{leadId}/emails/{templateId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace(
                '{' . 'templateId' . '}',
                ObjectSerializer::toPathValue($template_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdGet
     *
     * Get detailed lead information
     *
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2009
     */
    public function leadsLeadIdGet($lead_id)
    {
        list($response) = $this->leadsLeadIdGetWithHttpInfo($lead_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdGetWithHttpInfo
     *
     * Get detailed lead information
     *
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2009, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdGetWithHttpInfo($lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2009';
        $request = $this->leadsLeadIdGetRequest($lead_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse2009',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdGetAsync
     *
     * Get detailed lead information
     *
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdGetAsync($lead_id)
    {
        return $this->leadsLeadIdGetAsyncWithHttpInfo($lead_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdGetAsyncWithHttpInfo
     *
     * Get detailed lead information
     *
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdGetAsyncWithHttpInfo($lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2009';
        $request = $this->leadsLeadIdGetRequest($lead_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdGet'
     *
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdGetRequest($lead_id)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdGet'
            );
        }

        $resourcePath = '/leads/{leadId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet
     *
     * Download a mailbox email attachment
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $email_id Email Id (required)
     * @param  int $attachment_id Attachment Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet($lead_id, $email_id, $attachment_id)
    {
        list($response) = $this->leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetWithHttpInfo($lead_id, $email_id, $attachment_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetWithHttpInfo
     *
     * Download a mailbox email attachment
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $email_id Email Id (required)
     * @param  int $attachment_id Attachment Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetWithHttpInfo($lead_id, $email_id, $attachment_id)
    {
        $returnType = 'string';
        $request = $this->leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetRequest($lead_id, $email_id, $attachment_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetAsync
     *
     * Download a mailbox email attachment
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $email_id Email Id (required)
     * @param  int $attachment_id Attachment Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetAsync($lead_id, $email_id, $attachment_id)
    {
        return $this->leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetAsyncWithHttpInfo($lead_id, $email_id, $attachment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetAsyncWithHttpInfo
     *
     * Download a mailbox email attachment
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $email_id Email Id (required)
     * @param  int $attachment_id Attachment Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetAsyncWithHttpInfo($lead_id, $email_id, $attachment_id)
    {
        $returnType = 'string';
        $request = $this->leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetRequest($lead_id, $email_id, $attachment_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $email_id Email Id (required)
     * @param  int $attachment_id Attachment Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGetRequest($lead_id, $email_id, $attachment_id)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet'
            );
        }
        // verify the required parameter 'email_id' is set
        if ($email_id === null || (is_array($email_id) && count($email_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $email_id when calling leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet'
            );
        }
        // verify the required parameter 'attachment_id' is set
        if ($attachment_id === null || (is_array($attachment_id) && count($attachment_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $attachment_id when calling leadsLeadIdMailboxEmailIdAttachmentAttachmentIdGet'
            );
        }

        $resourcePath = '/leads/{leadId}/mailbox/{emailId}/attachment/{attachmentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($email_id !== null) {
            $resourcePath = str_replace(
                '{' . 'emailId' . '}',
                ObjectSerializer::toPathValue($email_id),
                $resourcePath
            );
        }
        // path params
        if ($attachment_id !== null) {
            $resourcePath = str_replace(
                '{' . 'attachmentId' . '}',
                ObjectSerializer::toPathValue($attachment_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream', 'application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdNotesGet
     *
     * Get lead notes
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20014
     */
    public function leadsLeadIdNotesGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdNotesGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdNotesGetWithHttpInfo
     *
     * Get lead notes
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20014, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdNotesGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20014';
        $request = $this->leadsLeadIdNotesGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20014',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdNotesGetAsync
     *
     * Get lead notes
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdNotesGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdNotesGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdNotesGetAsyncWithHttpInfo
     *
     * Get lead notes
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdNotesGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20014';
        $request = $this->leadsLeadIdNotesGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdNotesGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdNotesGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdNotesGet'
            );
        }

        $resourcePath = '/leads/{leadId}/notes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdNotesPost
     *
     * Create a lead note
     *
     * @param  \Swagger\Client\Model\Body3 $body Create a lead note (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20015
     */
    public function leadsLeadIdNotesPost($body, $lead_id)
    {
        list($response) = $this->leadsLeadIdNotesPostWithHttpInfo($body, $lead_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdNotesPostWithHttpInfo
     *
     * Create a lead note
     *
     * @param  \Swagger\Client\Model\Body3 $body Create a lead note (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20015, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdNotesPostWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20015';
        $request = $this->leadsLeadIdNotesPostRequest($body, $lead_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20015',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdNotesPostAsync
     *
     * Create a lead note
     *
     * @param  \Swagger\Client\Model\Body3 $body Create a lead note (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdNotesPostAsync($body, $lead_id)
    {
        return $this->leadsLeadIdNotesPostAsyncWithHttpInfo($body, $lead_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdNotesPostAsyncWithHttpInfo
     *
     * Create a lead note
     *
     * @param  \Swagger\Client\Model\Body3 $body Create a lead note (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdNotesPostAsyncWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20015';
        $request = $this->leadsLeadIdNotesPostRequest($body, $lead_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdNotesPost'
     *
     * @param  \Swagger\Client\Model\Body3 $body Create a lead note (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdNotesPostRequest($body, $lead_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling leadsLeadIdNotesPost'
            );
        }
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdNotesPost'
            );
        }

        $resourcePath = '/leads/{leadId}/notes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdPatch
     *
     * Update a lead
     *
     * @param  \Swagger\Client\Model\Body2 $body Lead changes (send only fields you want to change) (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20010
     */
    public function leadsLeadIdPatch($body, $lead_id)
    {
        list($response) = $this->leadsLeadIdPatchWithHttpInfo($body, $lead_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdPatchWithHttpInfo
     *
     * Update a lead
     *
     * @param  \Swagger\Client\Model\Body2 $body Lead changes (send only fields you want to change) (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20010, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdPatchWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20010';
        $request = $this->leadsLeadIdPatchRequest($body, $lead_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20010',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdPatchAsync
     *
     * Update a lead
     *
     * @param  \Swagger\Client\Model\Body2 $body Lead changes (send only fields you want to change) (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdPatchAsync($body, $lead_id)
    {
        return $this->leadsLeadIdPatchAsyncWithHttpInfo($body, $lead_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdPatchAsyncWithHttpInfo
     *
     * Update a lead
     *
     * @param  \Swagger\Client\Model\Body2 $body Lead changes (send only fields you want to change) (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdPatchAsyncWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20010';
        $request = $this->leadsLeadIdPatchRequest($body, $lead_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdPatch'
     *
     * @param  \Swagger\Client\Model\Body2 $body Lead changes (send only fields you want to change) (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdPatchRequest($body, $lead_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling leadsLeadIdPatch'
            );
        }
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdPatch'
            );
        }

        $resourcePath = '/leads/{leadId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdGeneratePost
     *
     * Generate an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20025
     */
    public function leadsLeadIdSignaturesApplicationIdGeneratePost($lead_id, $application_id)
    {
        list($response) = $this->leadsLeadIdSignaturesApplicationIdGeneratePostWithHttpInfo($lead_id, $application_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdGeneratePostWithHttpInfo
     *
     * Generate an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20025, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdSignaturesApplicationIdGeneratePostWithHttpInfo($lead_id, $application_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20025';
        $request = $this->leadsLeadIdSignaturesApplicationIdGeneratePostRequest($lead_id, $application_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20025',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdGeneratePostAsync
     *
     * Generate an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSignaturesApplicationIdGeneratePostAsync($lead_id, $application_id)
    {
        return $this->leadsLeadIdSignaturesApplicationIdGeneratePostAsyncWithHttpInfo($lead_id, $application_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdGeneratePostAsyncWithHttpInfo
     *
     * Generate an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSignaturesApplicationIdGeneratePostAsyncWithHttpInfo($lead_id, $application_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20025';
        $request = $this->leadsLeadIdSignaturesApplicationIdGeneratePostRequest($lead_id, $application_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdSignaturesApplicationIdGeneratePost'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdSignaturesApplicationIdGeneratePostRequest($lead_id, $application_id)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdSignaturesApplicationIdGeneratePost'
            );
        }
        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling leadsLeadIdSignaturesApplicationIdGeneratePost'
            );
        }

        $resourcePath = '/leads/{leadId}/signatures/{applicationId}/generate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($application_id !== null) {
            $resourcePath = str_replace(
                '{' . 'applicationId' . '}',
                ObjectSerializer::toPathValue($application_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdSendPost
     *
     * Send an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     * @param   $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20027
     */
    public function leadsLeadIdSignaturesApplicationIdSendPost($lead_id, $application_id, $body = null)
    {
        list($response) = $this->leadsLeadIdSignaturesApplicationIdSendPostWithHttpInfo($lead_id, $application_id, $body);
        return $response;
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdSendPostWithHttpInfo
     *
     * Send an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     * @param   $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20027, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdSignaturesApplicationIdSendPostWithHttpInfo($lead_id, $application_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20027';
        $request = $this->leadsLeadIdSignaturesApplicationIdSendPostRequest($lead_id, $application_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20027',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdSendPostAsync
     *
     * Send an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSignaturesApplicationIdSendPostAsync($lead_id, $application_id, $body = null)
    {
        return $this->leadsLeadIdSignaturesApplicationIdSendPostAsyncWithHttpInfo($lead_id, $application_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdSignaturesApplicationIdSendPostAsyncWithHttpInfo
     *
     * Send an e-signature document
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSignaturesApplicationIdSendPostAsyncWithHttpInfo($lead_id, $application_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20027';
        $request = $this->leadsLeadIdSignaturesApplicationIdSendPostRequest($lead_id, $application_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdSignaturesApplicationIdSendPost'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $application_id Application Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdSignaturesApplicationIdSendPostRequest($lead_id, $application_id, $body = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdSignaturesApplicationIdSendPost'
            );
        }
        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling leadsLeadIdSignaturesApplicationIdSendPost'
            );
        }

        $resourcePath = '/leads/{leadId}/signatures/{applicationId}/send';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($application_id !== null) {
            $resourcePath = str_replace(
                '{' . 'applicationId' . '}',
                ObjectSerializer::toPathValue($application_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdSignaturesGet
     *
     * Get a list of all lead e-signatures documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20026
     */
    public function leadsLeadIdSignaturesGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdSignaturesGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdSignaturesGetWithHttpInfo
     *
     * Get a list of all lead e-signatures documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20026, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdSignaturesGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20026';
        $request = $this->leadsLeadIdSignaturesGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20026',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdSignaturesGetAsync
     *
     * Get a list of all lead e-signatures documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSignaturesGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdSignaturesGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdSignaturesGetAsyncWithHttpInfo
     *
     * Get a list of all lead e-signatures documents
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSignaturesGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20026';
        $request = $this->leadsLeadIdSignaturesGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdSignaturesGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdSignaturesGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdSignaturesGet'
            );
        }

        $resourcePath = '/leads/{leadId}/signatures';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdSmsTemplateIdPost
     *
     * Send an sms to lead with selected sms template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20030
     */
    public function leadsLeadIdSmsTemplateIdPost($lead_id, $template_id, $body = null)
    {
        list($response) = $this->leadsLeadIdSmsTemplateIdPostWithHttpInfo($lead_id, $template_id, $body);
        return $response;
    }

    /**
     * Operation leadsLeadIdSmsTemplateIdPostWithHttpInfo
     *
     * Send an sms to lead with selected sms template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20030, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdSmsTemplateIdPostWithHttpInfo($lead_id, $template_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20030';
        $request = $this->leadsLeadIdSmsTemplateIdPostRequest($lead_id, $template_id, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20030',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdSmsTemplateIdPostAsync
     *
     * Send an sms to lead with selected sms template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSmsTemplateIdPostAsync($lead_id, $template_id, $body = null)
    {
        return $this->leadsLeadIdSmsTemplateIdPostAsyncWithHttpInfo($lead_id, $template_id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdSmsTemplateIdPostAsyncWithHttpInfo
     *
     * Send an sms to lead with selected sms template
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdSmsTemplateIdPostAsyncWithHttpInfo($lead_id, $template_id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20030';
        $request = $this->leadsLeadIdSmsTemplateIdPostRequest($lead_id, $template_id, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdSmsTemplateIdPost'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $template_id Template Id (required)
     * @param   $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdSmsTemplateIdPostRequest($lead_id, $template_id, $body = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdSmsTemplateIdPost'
            );
        }
        // verify the required parameter 'template_id' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling leadsLeadIdSmsTemplateIdPost'
            );
        }

        $resourcePath = '/leads/{leadId}/sms/{templateId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace(
                '{' . 'templateId' . '}',
                ObjectSerializer::toPathValue($template_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdTasksGet
     *
     * Get lead tasks
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20019
     */
    public function leadsLeadIdTasksGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdTasksGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdTasksGetWithHttpInfo
     *
     * Get lead tasks
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20019, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdTasksGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20019';
        $request = $this->leadsLeadIdTasksGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20019',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdTasksGetAsync
     *
     * Get lead tasks
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdTasksGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdTasksGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdTasksGetAsyncWithHttpInfo
     *
     * Get lead tasks
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdTasksGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20019';
        $request = $this->leadsLeadIdTasksGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdTasksGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdTasksGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdTasksGet'
            );
        }

        $resourcePath = '/leads/{leadId}/tasks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdTasksPost
     *
     * Create a lead task
     *
     * @param  \Swagger\Client\Model\Body5 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20020
     */
    public function leadsLeadIdTasksPost($body, $lead_id)
    {
        list($response) = $this->leadsLeadIdTasksPostWithHttpInfo($body, $lead_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdTasksPostWithHttpInfo
     *
     * Create a lead task
     *
     * @param  \Swagger\Client\Model\Body5 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20020, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdTasksPostWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20020';
        $request = $this->leadsLeadIdTasksPostRequest($body, $lead_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20020',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdTasksPostAsync
     *
     * Create a lead task
     *
     * @param  \Swagger\Client\Model\Body5 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdTasksPostAsync($body, $lead_id)
    {
        return $this->leadsLeadIdTasksPostAsyncWithHttpInfo($body, $lead_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdTasksPostAsyncWithHttpInfo
     *
     * Create a lead task
     *
     * @param  \Swagger\Client\Model\Body5 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdTasksPostAsyncWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20020';
        $request = $this->leadsLeadIdTasksPostRequest($body, $lead_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdTasksPost'
     *
     * @param  \Swagger\Client\Model\Body5 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdTasksPostRequest($body, $lead_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling leadsLeadIdTasksPost'
            );
        }
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdTasksPost'
            );
        }

        $resourcePath = '/leads/{leadId}/tasks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdUsersGet
     *
     * Get a list of assigned users
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20021
     */
    public function leadsLeadIdUsersGet($lead_id, $page = null, $per_page = null)
    {
        list($response) = $this->leadsLeadIdUsersGetWithHttpInfo($lead_id, $page, $per_page);
        return $response;
    }

    /**
     * Operation leadsLeadIdUsersGetWithHttpInfo
     *
     * Get a list of assigned users
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20021, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdUsersGetWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20021';
        $request = $this->leadsLeadIdUsersGetRequest($lead_id, $page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20021',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdUsersGetAsync
     *
     * Get a list of assigned users
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdUsersGetAsync($lead_id, $page = null, $per_page = null)
    {
        return $this->leadsLeadIdUsersGetAsyncWithHttpInfo($lead_id, $page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdUsersGetAsyncWithHttpInfo
     *
     * Get a list of assigned users
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdUsersGetAsyncWithHttpInfo($lead_id, $page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20021';
        $request = $this->leadsLeadIdUsersGetRequest($lead_id, $page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdUsersGet'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdUsersGetRequest($lead_id, $page = null, $per_page = null)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdUsersGet'
            );
        }

        $resourcePath = '/leads/{leadId}/users';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }

        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdUsersPost
     *
     * Assign a user
     *
     * @param  \Swagger\Client\Model\Body6 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20022
     */
    public function leadsLeadIdUsersPost($body, $lead_id)
    {
        list($response) = $this->leadsLeadIdUsersPostWithHttpInfo($body, $lead_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdUsersPostWithHttpInfo
     *
     * Assign a user
     *
     * @param  \Swagger\Client\Model\Body6 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20022, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdUsersPostWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20022';
        $request = $this->leadsLeadIdUsersPostRequest($body, $lead_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20022',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdUsersPostAsync
     *
     * Assign a user
     *
     * @param  \Swagger\Client\Model\Body6 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdUsersPostAsync($body, $lead_id)
    {
        return $this->leadsLeadIdUsersPostAsyncWithHttpInfo($body, $lead_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdUsersPostAsyncWithHttpInfo
     *
     * Assign a user
     *
     * @param  \Swagger\Client\Model\Body6 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdUsersPostAsyncWithHttpInfo($body, $lead_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20022';
        $request = $this->leadsLeadIdUsersPostRequest($body, $lead_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdUsersPost'
     *
     * @param  \Swagger\Client\Model\Body6 $body Create a lead task (required)
     * @param  int $lead_id Lead Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdUsersPostRequest($body, $lead_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling leadsLeadIdUsersPost'
            );
        }
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdUsersPost'
            );
        }

        $resourcePath = '/leads/{leadId}/users';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsLeadIdUsersUserIdDelete
     *
     * Unassign a user from a lead
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $user_id User Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20023
     */
    public function leadsLeadIdUsersUserIdDelete($lead_id, $user_id)
    {
        list($response) = $this->leadsLeadIdUsersUserIdDeleteWithHttpInfo($lead_id, $user_id);
        return $response;
    }

    /**
     * Operation leadsLeadIdUsersUserIdDeleteWithHttpInfo
     *
     * Unassign a user from a lead
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $user_id User Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20023, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsLeadIdUsersUserIdDeleteWithHttpInfo($lead_id, $user_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20023';
        $request = $this->leadsLeadIdUsersUserIdDeleteRequest($lead_id, $user_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20023',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsLeadIdUsersUserIdDeleteAsync
     *
     * Unassign a user from a lead
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $user_id User Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdUsersUserIdDeleteAsync($lead_id, $user_id)
    {
        return $this->leadsLeadIdUsersUserIdDeleteAsyncWithHttpInfo($lead_id, $user_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsLeadIdUsersUserIdDeleteAsyncWithHttpInfo
     *
     * Unassign a user from a lead
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $user_id User Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsLeadIdUsersUserIdDeleteAsyncWithHttpInfo($lead_id, $user_id)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20023';
        $request = $this->leadsLeadIdUsersUserIdDeleteRequest($lead_id, $user_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsLeadIdUsersUserIdDelete'
     *
     * @param  int $lead_id Lead Id (required)
     * @param  int $user_id User Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsLeadIdUsersUserIdDeleteRequest($lead_id, $user_id)
    {
        // verify the required parameter 'lead_id' is set
        if ($lead_id === null || (is_array($lead_id) && count($lead_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lead_id when calling leadsLeadIdUsersUserIdDelete'
            );
        }
        // verify the required parameter 'user_id' is set
        if ($user_id === null || (is_array($user_id) && count($user_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_id when calling leadsLeadIdUsersUserIdDelete'
            );
        }

        $resourcePath = '/leads/{leadId}/users/{userId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lead_id !== null) {
            $resourcePath = str_replace(
                '{' . 'leadId' . '}',
                ObjectSerializer::toPathValue($lead_id),
                $resourcePath
            );
        }
        // path params
        if ($user_id !== null) {
            $resourcePath = str_replace(
                '{' . 'userId' . '}',
                ObjectSerializer::toPathValue($user_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsPost
     *
     * Create a lead
     *
     * @param  \Swagger\Client\Model\Body1 $body Lead details (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2008
     */
    public function leadsPost($body)
    {
        list($response) = $this->leadsPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation leadsPostWithHttpInfo
     *
     * Create a lead
     *
     * @param  \Swagger\Client\Model\Body1 $body Lead details (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2008, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsPostWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2008';
        $request = $this->leadsPostRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse2008',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsPostAsync
     *
     * Create a lead
     *
     * @param  \Swagger\Client\Model\Body1 $body Lead details (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsPostAsync($body)
    {
        return $this->leadsPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsPostAsyncWithHttpInfo
     *
     * Create a lead
     *
     * @param  \Swagger\Client\Model\Body1 $body Lead details (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsPostAsyncWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2008';
        $request = $this->leadsPostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsPost'
     *
     * @param  \Swagger\Client\Model\Body1 $body Lead details (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsPostRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling leadsPost'
            );
        }

        $resourcePath = '/leads';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsSignaturesApplicationIdDownloadGet
     *
     * Download an e-signature document
     *
     * @param  int $application_id Application Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function leadsSignaturesApplicationIdDownloadGet($application_id)
    {
        list($response) = $this->leadsSignaturesApplicationIdDownloadGetWithHttpInfo($application_id);
        return $response;
    }

    /**
     * Operation leadsSignaturesApplicationIdDownloadGetWithHttpInfo
     *
     * Download an e-signature document
     *
     * @param  int $application_id Application Id (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsSignaturesApplicationIdDownloadGetWithHttpInfo($application_id)
    {
        $returnType = 'string';
        $request = $this->leadsSignaturesApplicationIdDownloadGetRequest($application_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsSignaturesApplicationIdDownloadGetAsync
     *
     * Download an e-signature document
     *
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsSignaturesApplicationIdDownloadGetAsync($application_id)
    {
        return $this->leadsSignaturesApplicationIdDownloadGetAsyncWithHttpInfo($application_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsSignaturesApplicationIdDownloadGetAsyncWithHttpInfo
     *
     * Download an e-signature document
     *
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsSignaturesApplicationIdDownloadGetAsyncWithHttpInfo($application_id)
    {
        $returnType = 'string';
        $request = $this->leadsSignaturesApplicationIdDownloadGetRequest($application_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsSignaturesApplicationIdDownloadGet'
     *
     * @param  int $application_id Application Id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsSignaturesApplicationIdDownloadGetRequest($application_id)
    {
        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling leadsSignaturesApplicationIdDownloadGet'
            );
        }

        $resourcePath = '/leads/signatures/{applicationId}/download';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($application_id !== null) {
            $resourcePath = str_replace(
                '{' . 'applicationId' . '}',
                ObjectSerializer::toPathValue($application_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream', 'application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsSmsTemplatesGet
     *
     * Get list of sms templates
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20031
     */
    public function leadsSmsTemplatesGet()
    {
        list($response) = $this->leadsSmsTemplatesGetWithHttpInfo();
        return $response;
    }

    /**
     * Operation leadsSmsTemplatesGetWithHttpInfo
     *
     * Get list of sms templates
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20031, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsSmsTemplatesGetWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20031';
        $request = $this->leadsSmsTemplatesGetRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20031',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse405',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsSmsTemplatesGetAsync
     *
     * Get list of sms templates
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsSmsTemplatesGetAsync()
    {
        return $this->leadsSmsTemplatesGetAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsSmsTemplatesGetAsyncWithHttpInfo
     *
     * Get list of sms templates
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsSmsTemplatesGetAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20031';
        $request = $this->leadsSmsTemplatesGetRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsSmsTemplatesGet'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsSmsTemplatesGetRequest()
    {

        $resourcePath = '/leads/sms/templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsSourcesGet
     *
     * Get a list of available sources
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20042
     */
    public function leadsSourcesGet()
    {
        list($response) = $this->leadsSourcesGetWithHttpInfo();
        return $response;
    }

    /**
     * Operation leadsSourcesGetWithHttpInfo
     *
     * Get a list of available sources
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20042, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsSourcesGetWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20042';
        $request = $this->leadsSourcesGetRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20042',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsSourcesGetAsync
     *
     * Get a list of available sources
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsSourcesGetAsync()
    {
        return $this->leadsSourcesGetAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsSourcesGetAsyncWithHttpInfo
     *
     * Get a list of available sources
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsSourcesGetAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20042';
        $request = $this->leadsSourcesGetRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsSourcesGet'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsSourcesGetRequest()
    {

        $resourcePath = '/leads/sources';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsStatusesGet
     *
     * Get a list of available statuses
     *
     * @param  int $group Group Id (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20043
     */
    public function leadsStatusesGet($group = null)
    {
        list($response) = $this->leadsStatusesGetWithHttpInfo($group);
        return $response;
    }

    /**
     * Operation leadsStatusesGetWithHttpInfo
     *
     * Get a list of available statuses
     *
     * @param  int $group Group Id (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20043, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsStatusesGetWithHttpInfo($group = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20043';
        $request = $this->leadsStatusesGetRequest($group);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20043',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsStatusesGetAsync
     *
     * Get a list of available statuses
     *
     * @param  int $group Group Id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsStatusesGetAsync($group = null)
    {
        return $this->leadsStatusesGetAsyncWithHttpInfo($group)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsStatusesGetAsyncWithHttpInfo
     *
     * Get a list of available statuses
     *
     * @param  int $group Group Id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsStatusesGetAsyncWithHttpInfo($group = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20043';
        $request = $this->leadsStatusesGetRequest($group);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsStatusesGet'
     *
     * @param  int $group Group Id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsStatusesGetRequest($group = null)
    {

        $resourcePath = '/leads/statuses';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($group !== null) {
            $queryParams['group'] = ObjectSerializer::toQueryValue($group);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation leadsUsersGet
     *
     * Get a list of available users
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse20021
     */
    public function leadsUsersGet($page = null, $per_page = null)
    {
        list($response) = $this->leadsUsersGetWithHttpInfo($page, $per_page);
        return $response;
    }

    /**
     * Operation leadsUsersGetWithHttpInfo
     *
     * Get a list of available users
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse20021, HTTP status code, HTTP response headers (array of strings)
     */
    public function leadsUsersGetWithHttpInfo($page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20021';
        $request = $this->leadsUsersGetRequest($page, $per_page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse20021',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation leadsUsersGetAsync
     *
     * Get a list of available users
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsUsersGetAsync($page = null, $per_page = null)
    {
        return $this->leadsUsersGetAsyncWithHttpInfo($page, $per_page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation leadsUsersGetAsyncWithHttpInfo
     *
     * Get a list of available users
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function leadsUsersGetAsyncWithHttpInfo($page = null, $per_page = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse20021';
        $request = $this->leadsUsersGetRequest($page, $per_page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'leadsUsersGet'
     *
     * @param  int $page Page number (optional)
     * @param  int $per_page Count of records per page (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function leadsUsersGetRequest($page = null, $per_page = null)
    {

        $resourcePath = '/leads/users';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
