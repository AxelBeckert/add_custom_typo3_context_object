# add custom elements to context class

# add new field to user aspect

To add a new field to the user aspect we need to overwrite te userAspect class.
XClass within LocalConfiguration and custom implementation within own userAspect class.

# add new aspect to context class

Use a middleware to add a custom aspect to the context class.
Query it afterwards in the same way as teh standard aspects are queried.

```php
     /** @var Context $context */
    $context = GeneralUtility::makeInstance(Context::class);
    $customAspect = $context->getAspect('ccmagnus.event_context');
    $csutomAspectProperty = $context->getPropertyFromAspect('ccmagnus.event_context','name');
```php
