<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;
    
    // Endereço de e-mail para o qual as mensagens serão enviadas
    private $_adminEmail;

    public function __construct($config = [])
    {
        // Define o email do administrador a partir da configuração
        $this->_adminEmail = Yii::$app->params['adminEmail'] ?? 'joaojoao2372001@gmail.com';
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // nome, email, assunto e mensagem são obrigatórios
            [['name', 'email', 'subject', 'body'], 'required'],
            // email deve ser um endereço de email válido
            ['email', 'email'],
            // verifyCode é necessário para o CAPTCHA
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'subject' => 'Assunto',
            'body' => 'Mensagem',
            'verifyCode' => 'Código de Verificação',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string|null $email o endereço de e-mail de destino
     * @return bool whether the email was sent
     */
    public function sendEmail($email = null)
    {
        // Se um email específico for fornecido, use-o; caso contrário, use o email do administrador
        $to = $email ?: $this->_adminEmail;
        
        try {
            $result = Yii::$app->mailer->compose()
                ->setTo($to)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->setHtmlBody(
                    '<p><strong>Nome:</strong> ' . $this->name . '</p>' .
                    '<p><strong>E-mail:</strong> ' . $this->email . '</p>' .
                    '<p><strong>Assunto:</strong> ' . $this->subject . '</p>' .
                    '<p><strong>Mensagem:</strong></p>' .
                    '<p>' . nl2br($this->body) . '</p>'
                )
                ->send();
                
            if (!$result) {
                // Registre o erro para facilitar a depuração
                Yii::error('Falha ao enviar email: ' . print_r(Yii::$app->mailer->transport->getError(), true));
            }
            
            return $result;
        } catch (\Exception $e) {
            // Registre a exceção para facilitar a depuração
            Yii::error('Exceção ao enviar email: ' . $e->getMessage());
            return false;
        }
    }
}
