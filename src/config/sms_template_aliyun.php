<?php
return [
//  'aliyun'  ,    'huawei'  ,     'twilio'  ,   'tencent'  ,
// config/sms_template_aliyun.php
// config/sms_template_phuawei.php
// config/sms_template_twilio.php
// config/sms_template_tencent.php
// 模板名称,模板Code,模板类型,审核状态,创建时间,模板内容
/*01*/  'refunds-and-reminders'                             =>["退款退货提醒","SMS_276095052","通知", "您的退款退货单有了变化，可去会员中心查看订单详情。",'status=0'],
/*02*/  'platform-customer-service-reply-reminder'          =>["平台客服回复提醒","SMS_275765183","通知", "您的平台客服咨询已经回复，可去会员中心查看详情。",'status=0'],
/*03*/  'the-use-of-vouchers-to-remind'                     => ["代金券使用提醒","SMS_275760164","通知", "您有代金券已经使用，可去会员中心查看订单详情。",'status=0'],
/*04*/  'scheduled-order-tail-payment-reminder'             => ["预定订单尾款支付提醒","SMS_276105051","通知", "您的订单已经进入支付尾款时间。",'status=0'],
/*05*/  'distributor-application-review'                    => ["分销商申请审核","SMS_275865161","通知", "尊敬的用户：您申请的供货商分销权限状态发生了改变，请及时查看。",'status=0'],
/*06*/  'store-expiration-reminder'                         => ["店铺到期提醒","SMS_275830165","通知", "你的店铺即将到期，请及时续期。",'status=0'],
/*07*/   'relieving-verification'                           => ["解除验证","SMS_276100036","通知", "您正在$\{site_name}账户上进行解除绑定操作,验证码为$\{yzm}。",'status=0'],/*请使用第29条*/
/*08*/   'commodity-inventory-notice'                       =>["商品库存不足","SMS_276040062","通知", "您$\{chain_name}的商品库存不足，请及时补货。SPU：$\{product_id}，SKU：$\{item_id},可去店铺查看详情。",'status=0'],
/*09*/  'settlement-sheet-for-confirmation'                 =>["结算单等待确认","SMS_276050069","通知", "您有新的结算单等待确认，开始时间：$\{start_time}，结束时间：$\{endtime}，结算单号：$\{order_id},可在店铺查看。",'status=0'],
/*10*/ 'settlement-bill-has-been-paid-to-remind'            => ["结算单已经付款提醒","SMS_275855184","通知", "您的结算单平台已付款，请注意查收，结算单编号：$\{order_id},可在店铺查看。",'status=0'],
/*11*/   'return-reminder'                                  =>["退货提醒","SMS_275795164","通知", "您有一个退款单需要处理，退款编号：$\{order_id},快去查看。",'status=0'],
/*12*/  'refunds-for-automatic-reminding'                   => ["退款自动处理提醒","SMS_276055080","通知", "您的退款单超期未处理，已自动同意买家退款申请。退款单编号：$\{order_id},可在店铺查看。",'status=0'],
/*13*/  'notice-of-deleting-goods'                          =>["删除商品通知","SMS_276095048","通知", "您的商品被删除。SPU：$\{product_id},可去店铺查看详情。原因：$\{des}！",'status=0'],
/*14*/  'illegal-commodity-shelves'                         => ["违规商品被下架","SMS_276040060","通知", "您的商品被违规下架，原因：$\{des}。SPU：$\{product_id},可去店铺查看详情。",'status=0'],
/*15*/  'commodity-audit-failed-to-remind'                  => ["商品审核失败提醒","SMS_275850164","通知", "您的商品$\{passed}通过管理员审核，原因：$\{des}。SPU：$\{product_id},可去店铺查看详情。",'status=0'],
/*16*/  'automatic-handling-reminder'                       => ["退货未收货自动处理提醒","SMS_276015066","通知", "您的退货单不处理收货超期未处理，已自动按弃货处理。退货单编号：$\{order_id},可在店铺查看。",'status=0'],
/*17*/  'pickupcode-reminding'                              => ["自提码","SMS_275830153","通知", "尊敬的用户您已在$\{site_name}成功购买$\{product_name}，您可凭自提码$\{chain_code}在$\{chain_name}自提。",'status=0'],
/*18*/   'payment-success-reminding'                        =>["付款成功提醒","SMS_275825163","通知", "关于订单：$\{order_id}的款项已经收到，请留意出库通知。可去会员中心查看订单详情。",'status=0'],
/*19*/  'ordor_complete_shipping'                           =>["发货通知","SMS_276030065","通知", "您的订单$\{order_id}于$\{date}时,已发货啦~",'status=0'],
/*20*/  'commodity-advisory-reply'                          =>["商品咨询回复提醒","SMS_275820165","通知",   "您关于商品$\{product_name}的咨询，商家已经回复。去会员中心查看回复。",'status=0'],
/*21*/ 'redemption-code-is-about-to-expire-reminder'        =>["兑换码即将到期提醒","SMS_275790160","通知", "您有一组兑换码即将在$\{endtime}过期，请记得使用。",'status=0'],
/*22*/  'fans-buy-notification'                             => ["粉丝购买通知推广员","SMS_275785173","通知", "您的粉丝 $\{user_nickname} 在商城消费 $\{order_payment_amount},  消费时间：$\{order_add_time}，订单编号：$\{order_id} ，订单名称：$\{product_name}。",'status=0'],
/*23*/ 'price-reduction-notice'                             => ["商品降价提醒","SMS_276060059","通知", "您关注的商品 $\{product_name} 价格变动为  $\{item_unit_price}。",'status=0'],
/*24*/ 'prepaid-card-balance-change-reminder'               =>["充值卡余额变动提醒","SMS_275845161","通知", "你的账户于$\{date}充值卡余额有变化，描述：$\{des}，可用充值卡余额变化 ：$\{av_amoun}元，冻结充值卡余额变化：$\{user_money_freeze}。可去支付中心查看充值卡余额。",'status=0'],
/*25*/ 'imminent-expiration-reminder'                       =>["代金券即将到期提醒","SMS_275815173","通知", "您有一个代金券即将在$\{endtime}过期，请记得使用，可去会员中心查看订单详情。",'status=0'],
/*26*/ 'refund-reminder'                                    =>["退款提醒","SMS_275815156","通知", "您有一个退款单需要处理，退款编号：$\{order_id},快去查看。",'status=0'],
/*27*/ 'binding_verification_code'                          =>["绑定验证码","SMS_275740079","验证码", "您正绑定手机,验证码为$\{yzm}。",'status=0'],
/*28*/ 'verifycode'                                         =>["验证码短信","SMS_275770003","验证码", "您的验证码为：$\{code}，请勿泄露于他人！",'status=0'],
/*29*/  'relieving-verification-2'                          => ["解除绑定验证码2","SMS_482780080","验证码", "您正在解除绑定操作，验证码为：$\{code}，5分钟有效，为保障帐户安全，请勿向任何人提供此验证码。",'status=0'],
/*30*/  'notice-of-delivery'                                =>["提醒发货","SMS_482940199","通知类","您的会员在$\{date}提交了订单$\{order_id}，请尽快发货。",'status=0'],
/*31*/  'corporate-transfer-reminder'                       =>["对公转帐提醒ok","SMS_482735180","通知类","对公帐号：海南优选石油石化设备有限公司，开户行：$\{string1}，账号：$\{string2}，金额：$\{string3}$\{string4}.摘要/备注/用途填写为：$\{string5}",'status=0'],
/*32*/  'checkCode'                                         =>["您的核销码","SMS_482920217","验证码类","您的核销码为$\{verify}，请注意保管，勿泄露给他人",'status=0'],
/*33*/  'complaint-reminding'                               =>["投诉提醒","SMS_460890343","通知类","您好，$\{site_name}提醒：您售出的商品被投诉，等待商家申诉。投诉单编号：$\{order_id}，请尽快处理。",'status=0'],//通过
/*34*/  'return-automatic-processing-reminder'              =>["退货自动处理提醒","SMS_460796247","通知类","您的退货单超期未处理，已自动同意买家退款申请。退货单编号： $\{order_id}可在店铺查看。",'status=0'],
/*35*/  'red-packet-use-reminding'                          =>["红包使用提醒","SMS_482880229","通知类","您有红包已经使用，编号：$\{order_id}，可去会员中心查看订单详情。",'status=0'],
/*36*/  'registration-of-welcome-information'               =>["注册欢迎信息","SMS_482715199","通知类","感谢您注册$\{site_name}，欢迎您。",'status=0'],//通过
/*37*/  'coupons-to-the-accounts'                           =>["优惠券到账","SMS_460816265","通知类","您的$\{name}优惠券，记得在$\{endtime}前使用哦~",'status=1'],//不通过
/*38*/   'balance-change-reminder'                          =>["余额变动提醒","SMS_482740195","通知类","你的账户于$\{date}  $\{time}账户资金有变化，描述：$\{des}，可用金额变化 ：$\{user_money}，冻结金额变化：$\{user_money_freeze}。可去支付中心查看余额。",'status=0'],
/*39*/  'audit-operation-reminder'                          =>["提醒后台审核操作","20068581384","通知类","您有一个审核操作需要处理，请登录运营后台查看。审核表名：$\{audit_tablename}  审核编号：$\{audit_id}，请尽快处理。",'status=0'],
/*40*/  'remind-merchants-(users)-of-the-backend-audit-results'           =>["给提醒商家（用户）后台审核结果","20068584414","通知类","您的$\{audit_name}，经审核结果为：$\{audit_result}，审核分类：$\{audit_tablename}  审核编号：$\{audit_id}，请尽快登录平台查看审核结果。",'status=0'],


/*41*/  'reminder-of-successful-merchant-registration'      =>["商家入驻成功提醒","20068587541","通知类","尊敬的商家，恭喜您成功入驻优派超！，您的登录信息如下：， 用户名：$\{username} ， 密码：$\{password} ，登录地址：https://www.upetrol.net/$\{urls}，请妥善保管好您的登录信息，切勿泄露给非本人使用。祝您生意兴隆！",'status=0'],
/*42*/  'remind-merchants-to-verify-their-public-accounts'      =>["后台已经打款提醒商家前往验证公户","20068668580","通知类","尊敬的商家$\{seller_name}，您尾号$\{card_number}的对公账户已于$\{date}--$\{time}收到优派超后台打款人民币$\{money}元，请登录商家后台核对流水并完成账户验证。登录链接：https://www.upetrol.net/$\{urls}。如有异常请立即联系[400-026-0808]，祝您生意兴隆！",'status=0'],






];