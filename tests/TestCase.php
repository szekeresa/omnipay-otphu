<?php

use Faker\Factory as Faker;
use LSS\Array2XML;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    public function __get($field)
    {
        if ($field === 'faker') {
            if (!isset($this->_faker)) {
                $this->_faker = Faker::create();
            }

            return $this->_faker;
        } else {
            return parent::__get($field);
        }
    }

    protected $lastException = null;

    public function setLastException($e)
    {
        $this->lastException = $e;
    }

    public function assertLastException($className)
    {
        if (empty($this->lastException) || !is_a($this->lastException, $className)) {
            $this->fail('Failed to assert that last exception is subclass of '.$className);
        }
        $this->lastException = null;
    }

    /**
     </env:Body>
     */
    public static $unknownShopIdResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.15. 19:53:43</endTime><instanceId xsi:type="xsd:string">8YuEEWnJyo7x5169189134</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48cG9zaWQ+NzQxNzk8L3Bvc2lkPjx0cmFuc2FjdGlvbmlkPjU8L3RyYW5zYWN0aW9uaWQ+PC9yZWNvcmQ+PC9yZXN1bHRzZXQ+PG1lc3NhZ2VsaXN0PjxtZXNzYWdlPkhJQU5ZWklLU0hPUFBVQkxJS1VTS1VMQ1M8L21lc3NhZ2U+PC9tZXNzYWdlbGlzdD48L2Fuc3dlcj4=</result><startTime xsi:type="xsd:string">2016.11.15. 19:53:43</startTime><templateName xsi:type="xsd:string">WEBSHOPFIZETESINDITAS</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $successfulPurchaseResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.15. 19:53:43</endTime><instanceId xsi:type="xsd:string">8YuEEWnJyo7x5169189134</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48dHJhbnNhY3Rpb25pZD4xN2RiOGZjNTRhMzczM2M0ODk4YTY3ZTBkYmJkODk5NjwvdHJhbnNhY3Rpb25pZD48L3JlY29yZD48L3Jlc3VsdHNldD48bWVzc2FnZWxpc3Q+PG1lc3NhZ2U+U0lLRVJFU1dFQlNIT1BGSVpFVEVTSU5ESVRBUzwvbWVzc2FnZT48L21lc3NhZ2VsaXN0PjwvYW5zd2VyPg==</result><startTime xsi:type="xsd:string">2016.11.15. 19:53:43</startTime><templateName xsi:type="xsd:string">WEBSHOPFIZETESINDITAS</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $invalidStatusCodeSuccessfulPurchaseResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.15. 22:11:07</endTime><instanceId xsi:type="xsd:string">dIsgwSLRmGOx5169691306</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48dHJhbnNhY3Rpb25pZD4xN2RiOGZjNTRhMzczM2M0ODk4YTY3ZTBkYmJkODk5NjwvdHJhbnNhY3Rpb25pZD48L3JlY29yZD48L3Jlc3VsdHNldD48bWVzc2FnZWxpc3Q+PG1lc3NhZ2U+bG9yZW1pcHN1bTwvbWVzc2FnZT48L21lc3NhZ2VsaXN0PjwvYW5zd2VyPg==</result><startTime xsi:type="xsd:string">2016.11.15. 22:11:07</startTime><templateName xsi:type="xsd:string">WEBSHOPFIZETESINDITAS</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $successfulTransactionIdGenerationResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.16. 23:19:52</endTime><instanceId xsi:type="xsd:string">5v6LHfZa0Oox5175304950</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPGFuc3dlcj48cmVzdWx0c2V0PjxyZWNvcmQ+PHBvc2lkPiMwMjI5OTk5MTwvcG9zaWQ+PGlkPjk0MTU4MDY5Mjg5OTkwNDEwNzgyNzU0MjA3Njg5OTEyPC9pZD48dGltZXN0YW1wPjIwMTYuMTEuMTYgMjMuMTkuNTIgNjk1PC90aW1lc3RhbXA+PC9yZWNvcmQ+PC9yZXN1bHRzZXQ+PG1lc3NhZ2VsaXN0PjxtZXNzYWdlPlNJS0VSPC9tZXNzYWdlPjwvbWVzc2FnZWxpc3Q+PGluZm9saXN0Lz48L2Fuc3dlcj4=</result><startTime xsi:type="xsd:string">2016.11.16. 23:19:52</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAZONGENERALAS</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $invalidClientSignatureResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.16. 22:52:10</endTime><instanceId xsi:type="xsd:string">umpwSabQy0Qx5175259813</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PC9yZXN1bHRzZXQ+PG1lc3NhZ2VsaXN0PjxtZXNzYWdlPkhJQkFTS0xJRU5TQUxBSVJBUzwvbWVzc2FnZT48L21lc3NhZ2VsaXN0PjwvYW5zd2VyPg==</result><startTime xsi:type="xsd:string">2016.11.16. 22:52:10</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAKCIOLEKERDEZES</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $transactionDetailsPendingResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.16. 23:59:42</endTime><instanceId xsi:type="xsd:string">3OKeKnLUlz0x5175403211</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48dHJhbnNhY3Rpb25pZD4xNzcyOGY4ZjlmODIzMTM0OTQwNDNiYjcyMjRiMmY2YzwvdHJhbnNhY3Rpb25pZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48c3RhdGU+VkVWT09MREFMX0lOUFVUVkFSQUtPWkFTPC9zdGF0ZT48cmVzcG9uc2Vjb2RlPjwvcmVzcG9uc2Vjb2RlPjxzaG9waW5mb3JtZWQ+ZmFsc2U8L3Nob3BpbmZvcm1lZD48c3RhcnRkYXRlPjIwMTYxMTE2MjM1NDQ5PC9zdGFydGRhdGU+PGVuZGRhdGU+PC9lbmRkYXRlPjxwYXJhbXM+PGlucHV0PjxiYWNrdXJsPmh0dHA6Ly93d3cuZ29vZ2xlLmNvbTwvYmFja3VybD48ZXhjaGFuZ2U+SFVGPC9leGNoYW5nZT48emlwY29kZW5lZWRlZD5mYWxzZTwvemlwY29kZW5lZWRlZD48bmFycmF0aW9ubmVlZGVkPmZhbHNlPC9uYXJyYXRpb25uZWVkZWQ+PG1haWxhZGRyZXNzbmVlZGVkPmZhbHNlPC9tYWlsYWRkcmVzc25lZWRlZD48Y291bnR5bmVlZGVkPkZBTFNFPC9jb3VudHluZWVkZWQ+PG5hbWVuZWVkZWQ+ZmFsc2U8L25hbWVuZWVkZWQ+PGxhbmd1YWdlY29kZT5odTwvbGFuZ3VhZ2Vjb2RlPjxjb3VudHJ5bmVlZGVkPkZBTFNFPC9jb3VudHJ5bmVlZGVkPjxhbW91bnQ+MTAwPC9hbW91bnQ+PHNldHRsZW1lbnRuZWVkZWQ+ZmFsc2U8L3NldHRsZW1lbnRuZWVkZWQ+PHN0cmVldG5lZWRlZD5mYWxzZTwvc3RyZWV0bmVlZGVkPjxjb25zdW1lcnJlY2VpcHRuZWVkZWQ+RkFMU0U8L2NvbnN1bWVycmVjZWlwdG5lZWRlZD48Y29uc3VtZXJyZWdpc3RyYXRpb25uZWVkZWQ+RkFMU0U8L2NvbnN1bWVycmVnaXN0cmF0aW9ubmVlZGVkPjwvaW5wdXQ+PG91dHB1dD48L291dHB1dD48L3BhcmFtcz48L3JlY29yZD48L3Jlc3VsdHNldD48bWVzc2FnZWxpc3Q+PG1lc3NhZ2U+U0lLRVI8L21lc3NhZ2U+PC9tZXNzYWdlbGlzdD48L2Fuc3dlcj4=</result><startTime xsi:type="xsd:string">2016.11.16. 23:59:42</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAKCIOLEKERDEZES</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $transactionDetailsCancelledResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.17. 00:01:58</endTime><instanceId xsi:type="xsd:string">D5E3TZrmqFbx5175403629</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48dHJhbnNhY3Rpb25pZD4xNzcyOGY4ZjlmODIzMTM0OTQwNDNiYjcyMjRiMmY2YzwvdHJhbnNhY3Rpb25pZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48c3RhdGU+VkVWT09MREFMX1ZJU1NaQVZPTlQ8L3N0YXRlPjxyZXNwb25zZWNvZGU+VklTU1pBVVRBU0lUT1RURklaRVRFUzwvcmVzcG9uc2Vjb2RlPjxzaG9waW5mb3JtZWQ+dHJ1ZTwvc2hvcGluZm9ybWVkPjxzdGFydGRhdGU+MjAxNjExMTYyMzU0NDk8L3N0YXJ0ZGF0ZT48ZW5kZGF0ZT4yMDE2MTExNzAwMDE1MDwvZW5kZGF0ZT48cGFyYW1zPjxpbnB1dD48YmFja3VybD5odHRwOi8vd3d3Lmdvb2dsZS5jb208L2JhY2t1cmw+PGV4Y2hhbmdlPkhVRjwvZXhjaGFuZ2U+PHppcGNvZGVuZWVkZWQ+ZmFsc2U8L3ppcGNvZGVuZWVkZWQ+PG5hcnJhdGlvbm5lZWRlZD5mYWxzZTwvbmFycmF0aW9ubmVlZGVkPjxtYWlsYWRkcmVzc25lZWRlZD5mYWxzZTwvbWFpbGFkZHJlc3NuZWVkZWQ+PGNvdW50eW5lZWRlZD5GQUxTRTwvY291bnR5bmVlZGVkPjxuYW1lbmVlZGVkPmZhbHNlPC9uYW1lbmVlZGVkPjxsYW5ndWFnZWNvZGU+aHU8L2xhbmd1YWdlY29kZT48Y291bnRyeW5lZWRlZD5GQUxTRTwvY291bnRyeW5lZWRlZD48YW1vdW50PjEwMDwvYW1vdW50PjxzZXR0bGVtZW50bmVlZGVkPmZhbHNlPC9zZXR0bGVtZW50bmVlZGVkPjxzdHJlZXRuZWVkZWQ+ZmFsc2U8L3N0cmVldG5lZWRlZD48Y29uc3VtZXJyZWNlaXB0bmVlZGVkPkZBTFNFPC9jb25zdW1lcnJlY2VpcHRuZWVkZWQ+PGNvbnN1bWVycmVnaXN0cmF0aW9ubmVlZGVkPkZBTFNFPC9jb25zdW1lcnJlZ2lzdHJhdGlvbm5lZWRlZD48L2lucHV0PjxvdXRwdXQ+PC9vdXRwdXQ+PC9wYXJhbXM+PC9yZWNvcmQ+PC9yZXN1bHRzZXQ+PG1lc3NhZ2VsaXN0PjxtZXNzYWdlPlNJS0VSPC9tZXNzYWdlPjwvbWVzc2FnZWxpc3Q+PC9hbnN3ZXI+</result><startTime xsi:type="xsd:string">2016.11.17. 00:01:58</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAKCIOLEKERDEZES</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $transactionDetailsCancelled2ResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.17. 00:14:47</endTime><instanceId xsi:type="xsd:string">4N5LDEstOtWx5175418684</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48dHJhbnNhY3Rpb25pZD4xMDgxNzU0OWVlOWQzNGQ5Yjk2NGEyYWUzNzgzMjA0YTwvdHJhbnNhY3Rpb25pZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48c3RhdGU+VkVWT09MREFMX1RJTUVPVVQ8L3N0YXRlPjxyZXNwb25zZWNvZGU+RklaRVRFU1RJTUVPVVQ8L3Jlc3BvbnNlY29kZT48c2hvcGluZm9ybWVkPnRydWU8L3Nob3BpbmZvcm1lZD48c3RhcnRkYXRlPjIwMTYxMTE3MDAwMzU2PC9zdGFydGRhdGU+PGVuZGRhdGU+MjAxNjExMTcwMDEyMDI8L2VuZGRhdGU+PHBhcmFtcz48aW5wdXQ+PGJhY2t1cmw+aHR0cDovL3d3dy5nb29nbGUuY29tPC9iYWNrdXJsPjxleGNoYW5nZT5IVUY8L2V4Y2hhbmdlPjx6aXBjb2RlbmVlZGVkPmZhbHNlPC96aXBjb2RlbmVlZGVkPjxuYXJyYXRpb25uZWVkZWQ+ZmFsc2U8L25hcnJhdGlvbm5lZWRlZD48bWFpbGFkZHJlc3NuZWVkZWQ+ZmFsc2U8L21haWxhZGRyZXNzbmVlZGVkPjxjb3VudHluZWVkZWQ+RkFMU0U8L2NvdW50eW5lZWRlZD48bmFtZW5lZWRlZD5mYWxzZTwvbmFtZW5lZWRlZD48bGFuZ3VhZ2Vjb2RlPmh1PC9sYW5ndWFnZWNvZGU+PGNvdW50cnluZWVkZWQ+RkFMU0U8L2NvdW50cnluZWVkZWQ+PGFtb3VudD4xMDA8L2Ftb3VudD48c2V0dGxlbWVudG5lZWRlZD5mYWxzZTwvc2V0dGxlbWVudG5lZWRlZD48c3RyZWV0bmVlZGVkPmZhbHNlPC9zdHJlZXRuZWVkZWQ+PGNvbnN1bWVycmVjZWlwdG5lZWRlZD5GQUxTRTwvY29uc3VtZXJyZWNlaXB0bmVlZGVkPjxjb25zdW1lcnJlZ2lzdHJhdGlvbm5lZWRlZD5GQUxTRTwvY29uc3VtZXJyZWdpc3RyYXRpb25uZWVkZWQ+PC9pbnB1dD48b3V0cHV0Pjwvb3V0cHV0PjwvcGFyYW1zPjwvcmVjb3JkPjwvcmVzdWx0c2V0PjxtZXNzYWdlbGlzdD48bWVzc2FnZT5TSUtFUjwvbWVzc2FnZT48L21lc3NhZ2VsaXN0PjwvYW5zd2VyPg==</result><startTime xsi:type="xsd:string">2016.11.17. 00:14:47</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAKCIOLEKERDEZES</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $transactionDetailsCompletedResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.17. 00:33:00</endTime><instanceId xsi:type="xsd:string">HELMjQBEfU9x5175449053</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48dHJhbnNhY3Rpb25pZD4yNjgzOTZmZGEwNTQzMDg5YWNlYjIzY2MzNTMzMWViOTwvdHJhbnNhY3Rpb25pZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48c3RhdGU+RkVMRE9MR09aVkE8L3N0YXRlPjxyZXNwb25zZWNvZGU+MDAwPC9yZXNwb25zZWNvZGU+PHNob3BpbmZvcm1lZD50cnVlPC9zaG9waW5mb3JtZWQ+PHN0YXJ0ZGF0ZT4yMDE2MTExNzAwMjc1Njwvc3RhcnRkYXRlPjxlbmRkYXRlPjIwMTYxMTE3MDAzMDIxPC9lbmRkYXRlPjxwYXJhbXM+PGlucHV0PjxiYWNrdXJsPmh0dHA6Ly93d3cuZ29vZ2xlLmNvbTwvYmFja3VybD48ZXhjaGFuZ2U+SFVGPC9leGNoYW5nZT48emlwY29kZW5lZWRlZD5mYWxzZTwvemlwY29kZW5lZWRlZD48bmFycmF0aW9ubmVlZGVkPmZhbHNlPC9uYXJyYXRpb25uZWVkZWQ+PG1haWxhZGRyZXNzbmVlZGVkPmZhbHNlPC9tYWlsYWRkcmVzc25lZWRlZD48Y291bnR5bmVlZGVkPkZBTFNFPC9jb3VudHluZWVkZWQ+PG5hbWVuZWVkZWQ+ZmFsc2U8L25hbWVuZWVkZWQ+PGxhbmd1YWdlY29kZT5odTwvbGFuZ3VhZ2Vjb2RlPjxjb3VudHJ5bmVlZGVkPkZBTFNFPC9jb3VudHJ5bmVlZGVkPjxhbW91bnQ+MTAwPC9hbW91bnQ+PHNldHRsZW1lbnRuZWVkZWQ+ZmFsc2U8L3NldHRsZW1lbnRuZWVkZWQ+PHN0cmVldG5lZWRlZD5mYWxzZTwvc3RyZWV0bmVlZGVkPjxjb25zdW1lcnJlY2VpcHRuZWVkZWQ+RkFMU0U8L2NvbnN1bWVycmVjZWlwdG5lZWRlZD48Y29uc3VtZXJyZWdpc3RyYXRpb25uZWVkZWQ+RkFMU0U8L2NvbnN1bWVycmVnaXN0cmF0aW9ubmVlZGVkPjwvaW5wdXQ+PG91dHB1dD48YXV0aG9yaXphdGlvbmNvZGU+NDA1Mjk4PC9hdXRob3JpemF0aW9uY29kZT48L291dHB1dD48L3BhcmFtcz48L3JlY29yZD48L3Jlc3VsdHNldD48bWVzc2FnZWxpc3Q+PG1lc3NhZ2U+U0lLRVI8L21lc3NhZ2U+PC9tZXNzYWdlbGlzdD48L2Fuc3dlcj4=</result><startTime xsi:type="xsd:string">2016.11.17. 00:33:00</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAKCIOLEKERDEZES</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';
    public static $transactionDetailsRejectedResponseBody = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><env:Header></env:Header><env:Body env:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><m:startWorkflowSynchResponse xmlns:m="java:hu.iqsoft.otp.mw.access"><return xmlns:n1="java:hu.iqsoft.otp.mw.access" xsi:type="n1:WorkflowState"><completed xsi:type="xsd:boolean">true</completed><endTime xsi:type="xsd:string">2016.11.17. 00:34:34</endTime><instanceId xsi:type="xsd:string">nfEwUnzkjPix5175447762</instanceId><result xsi:type="xsd:base64Binary">PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz48YW5zd2VyPjxyZXN1bHRzZXQ+PHJlY29yZD48dHJhbnNhY3Rpb25pZD40Nzk0Y2M2MjQxMWUzNGNlYWJjODE2Mzk4NTNiMjViYTwvdHJhbnNhY3Rpb25pZD48cG9zaWQ+IzAyMjk5OTkxPC9wb3NpZD48c3RhdGU+RkVMRE9MR09aVkE8L3N0YXRlPjxyZXNwb25zZWNvZGU+MDU2PC9yZXNwb25zZWNvZGU+PHNob3BpbmZvcm1lZD50cnVlPC9zaG9waW5mb3JtZWQ+PHN0YXJ0ZGF0ZT4yMDE2MTExNzAwMzMxNTwvc3RhcnRkYXRlPjxlbmRkYXRlPjIwMTYxMTE3MDAzNDIyPC9lbmRkYXRlPjxwYXJhbXM+PGlucHV0PjxiYWNrdXJsPmh0dHA6Ly93d3cuZ29vZ2xlLmNvbTwvYmFja3VybD48ZXhjaGFuZ2U+SFVGPC9leGNoYW5nZT48emlwY29kZW5lZWRlZD5mYWxzZTwvemlwY29kZW5lZWRlZD48bmFycmF0aW9ubmVlZGVkPmZhbHNlPC9uYXJyYXRpb25uZWVkZWQ+PG1haWxhZGRyZXNzbmVlZGVkPmZhbHNlPC9tYWlsYWRkcmVzc25lZWRlZD48Y291bnR5bmVlZGVkPkZBTFNFPC9jb3VudHluZWVkZWQ+PG5hbWVuZWVkZWQ+ZmFsc2U8L25hbWVuZWVkZWQ+PGxhbmd1YWdlY29kZT5odTwvbGFuZ3VhZ2Vjb2RlPjxjb3VudHJ5bmVlZGVkPkZBTFNFPC9jb3VudHJ5bmVlZGVkPjxhbW91bnQ+MTAwPC9hbW91bnQ+PHNldHRsZW1lbnRuZWVkZWQ+ZmFsc2U8L3NldHRsZW1lbnRuZWVkZWQ+PHN0cmVldG5lZWRlZD5mYWxzZTwvc3RyZWV0bmVlZGVkPjxjb25zdW1lcnJlY2VpcHRuZWVkZWQ+RkFMU0U8L2NvbnN1bWVycmVjZWlwdG5lZWRlZD48Y29uc3VtZXJyZWdpc3RyYXRpb25uZWVkZWQ+RkFMU0U8L2NvbnN1bWVycmVnaXN0cmF0aW9ubmVlZGVkPjwvaW5wdXQ+PG91dHB1dD48L291dHB1dD48L3BhcmFtcz48L3JlY29yZD48L3Jlc3VsdHNldD48bWVzc2FnZWxpc3Q+PG1lc3NhZ2U+U0lLRVI8L21lc3NhZ2U+PC9tZXNzYWdlbGlzdD48L2Fuc3dlcj4=</result><startTime xsi:type="xsd:string">2016.11.17. 00:34:34</startTime><templateName xsi:type="xsd:string">WEBSHOPTRANZAKCIOLEKERDEZES</templateName><timeout xsi:type="xsd:boolean">false</timeout></return></m:startWorkflowSynchResponse></env:Body></env:Envelope>';

    public function getDummyRsaPrivateKey()
    {
        return '-----BEGIN RSA PRIVATE KEY-----
MIICWgIBAAKBgQCUnRq1I95d2PxR+RwCa+BT8GxeH9t7qCna+cDRnJDfNbgrosUM
n9VYGBSAG4S2KqEgNgA6eh9w0xQgNQ/pVKLPgdCjENBnwrZcH+NMyqO9ERHlhMXO
ddkDCMfVqjQIehfD68kiAPd+S4FWVZ1Efcy6twnr7KRignDz9q7F+VqoiQIBJQKB
gCgqdevEgUnL8SrpYYQdJ99VvGx3UBOVO76kXaBvgRm7feJHquDRQJRZiQAHb/ni
Agi0ph2kdzM/95oAgNdHTpiIPjDtK5ovr5Wg2N6xzHV0hOQsR6m6N4CUjVR5WrR5
PWcq7rnyDOgzEzZjRF6T8LV4sKAbcON5EAKh/M88KWlNAkEA33daMgpxAXJGXRBE
pCg11+asDygpd7IlV0nXVcumYvufMW3JfhGRRCOi5qsuIhv31kGLEYT1tUQVsY+x
ouQIFQJBAKo/+j4LCRDUBbx9acfT1KOl7TguF2a/6FimRcaYxlaFwJuBqINPxRcw
Nv+oUgUcidVuEHWXVloLOu3Ee/fdZ6UCQQCQ83jGg1A4Sh/Nqa/7xw4rLddjxwYk
IIbsguyKrZxb4XwEYuOQC2UlR4xCmIyggNgcRjCxawA+OgA70tQWocANAkBFBS4Z
JxGDXN+7HhYglCXFzaVb9wKRcGUdBSM01ibkznCtvvFJ/b6asq6DUhNp2yMfLJ7j
kGFHGU89zDJB5CMZAkAD6gCd9i74NNmXjp6w1xl/4ngIYpZsAG5oqQu4a15h03yX
UPNeFSinFvysmiUWiVCSIO1GjSHctPrr4Sx8lJTG
-----END RSA PRIVATE KEY-----
';
    }

    protected function array_get($array = [], $fieldName = '', $default = null)
    {
        if (!empty($fieldName) && is_array($array) && isset($array[$fieldName])) {
            return $array[$fieldName];
        } else {
            return $default;
        }
    }

    /**
     * Generate a full response body text (xml envelope + payload) to mock gateway responses.
     */
    public function generateResponseBody($payload = [], $meta = [])
    {
        Array2XML::init('1.0', 'UTF-8', false);
        $payload = base64_encode(
            str_replace(
                ['"', "\n", 'UTF-8'],
                ["'", '',   'utf-8'],
                Array2XML::createXML('answer', $payload)->saveXML()
            )
        );

        Array2XML::init('1.0', 'UTF-8', false);
        $dom = Array2XML::createXML('env:Envelope',
            [
            '@attributes' => [
                'xmlns:env' => 'http://schemas.xmlsoap.org/soap/envelope/',
                'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                'xmlns:soapenc' => 'http://schemas.xmlsoap.org/soap/encoding/',
                'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
            ],
            'env:Header' => [''],
            'env:Body' => [
                '@attributes' => [
                    'env:encodingStyle' => 'http://schemas.xmlsoap.org/soap/encoding/',
                ],
                'm:startWorkflowSynchResponse' => [
                    '@attributes' => [
                        'xmlns:m' => 'java:hu.iqsoft.otp.mw.access',
                    ],
                    'return' => [
                        '@attributes' => [
                            'xmlns:n1' => 'java:hu.iqsoft.otp.mw.access',
                            'xsi:type' => 'n1:WorkflowState',
                        ],
                        'completed' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:boolean',
                            ],
                            '@value' => $this->array_get($meta, 'completed', 'true'),
                        ],
                        'endTime' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:string',
                            ],
                            '@value' => $this->array_get($meta, 'endTime', '2016.11.15. 19:53:43'),
                        ],
                        'instanceId' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:string',
                            ],
                            '@value' => '8YuEEWnJyo7x5169189134',
                        ],
                        'result' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:base64Binary',
                            ],
                            '@value' => $payload,
                        ],
                        'startTime' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:string',
                            ],
                            '@value' => $this->array_get($meta, 'startTime', '2016.11.15. 19:53:43'),
                        ],
                        'templateName' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:string',
                            ],
                            '@value' => $this->array_get($meta, 'templateName', 'WEBSHOPFIZETESINDITAS'),
                        ],
                        'timeout' => [
                            '@attributes' => [
                                'xsi:type' => 'xsd:boolean',
                            ],
                            '@value' => $this->array_get($meta, 'timeout', 'false'),
                        ],
                    ],
                ],
            ],
        ]);
        $xml = $dom->saveXML();

        $xml = str_replace(['<?xml version="1.0" encoding="UTF-8"?>', "\n"], '', $xml);

        return $xml;
    }
}
