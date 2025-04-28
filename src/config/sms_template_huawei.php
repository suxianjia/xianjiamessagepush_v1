<?php
return [
    // config/sms_template_aliyun.php
// config/sms_template_phuawei.php
// config/sms_template_twilio.php
// config/sms_template_tencent.php
/*01*/  'refunds-and-reminders'                             =>["退款退货提醒","4101a38804d84ece883b3966173c91d7","通知类","您的退款退货单有了变化，可去会员中心查看订单详情。",'status=0'],
/*02*/  'platform-customer-service-reply-reminder'          =>["平台客服回复提醒","1e34beb1423f4a1cbc78e6e8502595c9","通知类","您的平台客服咨询已经回复，可去会员中心查看详情。",'status=0'],
/*03*/  'the-use-of-vouchers-to-remind'                     =>["代金券使用提醒","2998cf7857a646a5a2b9c15e922eabaa","通知类","您有代金券已经使用，可去会员中心查看订单详情。",'status=0'],
/*04*/  'scheduled-order-tail-payment-reminder'             =>["预定订单尾款支付提醒","ec342315e74949c494eced3aec2147a8","通知类","您的订单已经进入支付尾款时间。",'status=0'],
/*05*/  'distributor-application-review'                    =>["分销商申请审核","178e830e13dd45a8ba60e25e10dc0df0","通知类","尊敬的用户：您申请的供货商分销权限状态发生了改变，请及时查看。",'status=0'],
/*06*/  'store-expiration-reminder'                         =>["店铺到期提醒","4edfb60e999543eea85498654c87e721","通知类","你的店铺即将到期，请及时续期。",'status=0'],
/*07*/   'relieving-verification'                           =>["解除验证","46b780f1934943d3a5e5828894579373","通知类","您正在$\{site_name}账户上进行解除绑定操作,验证码为$\{yzm}。",'status=0'],/*请使用第29条 */  
/*08*/   'commodity-inventory-notice'                       =>["商品库存不足","99fbbc784a4b4681aff43c4ea5d4cf0f","通知类","您$\{chain_name}的商品库存不足，请及时补货。SPU：$\{product_id}，SKU：$\{item_id},可去店铺查看详情。",'status=0'],
/*09*/  'settlement-sheet-for-confirmation'                 =>["结算单等待确认提醒","02069762f1d44efe9420e825d45ab1bf","通知类","您有新的结算单等待确认，开始时间：$\{start_time}，结束时间：$\{endtime}，结算单号：$\{order_id},可在店铺查看。",'status=0'],
/*10*/ 'settlement-bill-has-been-paid-to-remind'            =>["结算单已经付款提醒","dad118f51abd468cb376c9d90f16e379","通知类","您的结算单平台已付款，请注意查收，结算单编号：$\{order_id},可在店铺查看。",'status=0'],
/*11*/   'return-reminder'                                  =>["退货提醒","4c7ccb5bd28d42dd9b7944d72fca23a9","通知类","您有一个退款单需要处理，退款编号：$\{order_id},快去查看。",'status=0'],
/*12*/  'refunds-for-automatic-reminding'                   =>["退款自动处理提醒","fa5485a3bc9a47178ecda7da3757dbd1","通知类","您的退款单超期未处理，已自动同意买家退款申请。退款单编号：$\{order_id},可在店铺查看。",'status=0'],
/*13*/  'notice-of-deleting-goods'                          =>["删除商品通知","64fb9314a5d24e9e9cefdb7c3e7d834f","通知类","您的商品被删除。SPU：$\{product_id},可去店铺查看详情。原因：$\{des}！",'status=0'],
/*14*/  'illegal-commodity-shelves'                         =>["违规商品被下架","5fda9c9b5e044f9ebdd7209d8153a140","通知类","您的商品被违规下架，原因：$\{des}。SPU：$\{product_id},可去店铺查看详情。",'status=0'],
/*15*/  'commodity-audit-failed-to-remind'                  =>["商品审核失败提醒","e98ea0a20a914fe48f87d0c89714b670","通知类","您的商品$\{passed}通过管理员审核，原因：$\{des}。SPU：$\{product_id},可去店铺查看详情。",'status=0'],
/*16*/  'automatic-handling-reminder'                       =>["退货未收货自动处理提醒","e38761be80f84107b2bd4a7d4248f5a8","通知类","您的退货单不处理收货超期未处理，已自动按弃货处理。退货单编号：$\{order_id},可在店铺查看。",'status=0'],
/*17*/  'pickupcode-reminding'                              =>["自提码","7bf4c048c3e74ceaa7b3def42d9ba0bc","通知类","尊敬的用户您已在$\{site_name}成功购买$\{product_name}，您可凭自提码$\{chain_code}在$\{chain_name}自提。",'status=0'],
/*18*/   'payment-success-reminding'                        =>["付款成功提醒","61e2ccad916c48ec97566e3eb4e6d614","通知类","关于订单：$\{order_id}的款项已经收到，请留意出库通知。可去会员中心查看订单详情。",'status=0'],
/*19*/  'ordor_complete_shipping'                           =>["发货通知","37135339ea124ed7abfb8c8bb1224d48","通知类","您的会员在$\{date}$\{time}提交了订单$\{order_id}，请尽快发货。",'status=0'],
/*20*/  'commodity-advisory-reply'                          =>["商品咨询回复提醒","2daedb2d339142f594b371fd192e820e","通知类","您关于商品$\{product_name}的咨询，商家已经回复。去会员中心查看回复。",'status=0'],
/*21*/ 'redemption-code-is-about-to-expire-reminder'        =>["兑换码即将到期提醒","eb9bc6fad05f4770b71d0e3bb0644f72","通知类","您有一组兑换码即将在$\{endtime}过期，请记得使用。",'status=0'],
/*22*/  'fans-buy-notification'                             =>["粉丝购买通知推广员","267a09f636c24dcb936a5fc8e4610b16","通知类","您的粉丝 $\{user_nickname} 在商城消费 $\{order_payment_amount},  消费时间：$\{order_add_time}，订单编号：$\{order_id} ，订单名称：$\{product_name}。",'status=0'],
/*23*/   'price-reduction-notice'                           => ["商品降价提醒","54edeb6b0cbf4c7dbf3d849e7b40b7aa","通知类","您关注的商品 $\{product_name} 价格变动为  $\{item_unit_price}。",'status=0'],
/*24*/   'prepaid-card-balance-change-reminder'             =>["充值卡余额变动提醒","d862d413d0b34f3f949d5f459a4c185c","通知类","你的账户于$\{date}充值卡余额有变化，描述：$\{des}，可用充值卡余额变化 ：$\{av_amoun}元，冻结充值卡余额变化：$\{user_money_freeze}。可去支付中心查看充值卡余额。",'status=0'],
/*25*/   'imminent-expiration-reminder'                     =>["代金券即将到期提醒","9503ed5d781e4d288a8813f9f72776e1","通知类","您有一个代金券即将在$\{endtime}过期，请记得使用，可去会员中心查看订单详情。",'status=0'],
/*26*/   'refund-reminder'                                  =>["退款提醒","1256d4e02da6488eb51d82b954270aef","通知类","您有一个退款单需要处理，退款编号：$\{order_id},快去查看",'status=0'],
/*27*/   'binding_verification_code'                        =>["绑定验证码","78005042ce62480695e89d57a2a675e3","通知类","您正绑定手机在$\{site_name}账户上,验证码为$\{yzm}。",'status=0'],
/*28*/   'verifycode'                                       =>["验证码","51584bfcd4834fd08f28c251e9dd1452","验证码类","您的验证码$\{yzm}，$\{minutes}分钟内有效。",'status=0'],
/*29*/  'relieving-verification-2'                          => ["解除绑定验证码2","d1de35b550394a9aa96dc1eb9ba02dd5","验证码", "您正在解除绑定操作，验证码为：$\{code}，5分钟有效，为保障帐户安全，请勿向任何人提供此验证码。",'status=0'], 
/*30*/  'notice-of-delivery'                                =>["提醒发货","384c475f42b8474895c59d0b2efda2c3","通知类","您的会员在$\{date}提交了订单$\{order_id}，请尽快发货。",'status=0'],
/*31*/  'corporate-transfer-reminder'                       =>["对公转帐提醒ok","b265ccbc33a9472ab938475a67d0d0bf","通知类","对公帐号：海南优选石油石化设备有限公司，开户行：$\{string1}，账号：$\{string2}，金额：$\{string3}$\{string4}.摘要/备注/用途填写为：$\{string5}",'status=0'],
/*32*/  'checkCode'                                         =>["您的核销码","262270a7a7d6402298bd11e6985857ab","验证码类","您的核销码是: $\{yzm}，请勿泄漏于他人！",'status=0'],
/*33*/  'complaint-reminding'                               =>["投诉提醒","9c662696ce874728b27c1ce5b2d8cc12","通知类","您好，$\{site_name}提醒：您售出的商品被投诉，等待商家申诉。投诉单编号：$\{order_id}，请尽快处理。",'status=0'],
/*34*/  'return-automatic-processing-reminder'              =>["退货自动处理提醒","862abe9eae4c49468f459b2eec0cfd1c","通知类","您的退货单超期未处理，已自动同意买家退款申请。退货单编号： $\{order_id}可在店铺查看。",'status=0'],
/*35*/  'red-packet-use-reminding'                          =>["红包使用提醒","6bfad731613e4a6997fdb51b323c4f7b","通知类","您有红包已经使用，编号：$\{order_id}，可去会员中心查看订单详情。",'status=0'],
/*36*/  'registration-of-welcome-information'               =>["注册欢迎信息","a6154e257b8a405db26c7ba700a1ad4f","通知类","感谢您注册$\{site_name}，欢迎您。",'status=0'],
/*37*/  'coupons-to-the-accounts'                           =>["优惠券到账","        ","通知类","您的$\{name}优惠券，记得在$\{endtime}前使用哦~",'status=1'],
/*38*/   'balance-change-reminder'                          =>["余额变动提醒","c3238654295f489e95de44bd34089ef8","通知类","你的账户于$\{date}  $\{time}账户资金有变化，描述：$\{des}，可用金额变化 ：$\{user_money}，冻结金额变化：$\{user_money_freeze}。可去支付中心查看余额。",'status=0'],
/*39*/  /*审核操作提醒*/ 'audit-operation-reminder'           =>["后台审核操作提醒","","通知类","您有一个审核操作需要处理，请登录运营后台查看。审核表名：$\{audit_tablename}  审核编号：$\{audit_id}，请尽快处理。",'status=1'],
/*40*/  'remind-merchants-(users)-of-the-backend-audit-results'   =>["给提醒商家（用户）后台审核结果","2416613","通知类","您的{1}，经审核结果为：{2}，审核分类：{3} 审核编号：{4}，请尽快登录平台查看审核结果。",'status=1'],



/*41*/  'reminder-of-successful-merchant-registration'      =>["商家入驻成功提醒","2416651","通知类","尊敬的商家，恭喜您成功入驻优派超！，您的登录信息如下：， 用户名：{1} ， 密码：{2} ，登录地址：https://www.upetrol.net/{3}，请妥善保管好您的登录信息，切勿泄露给非本人使用。祝您生意兴隆！",'status=1'],


];