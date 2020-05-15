<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accounts;

/**
 * AccountsSearch represents the model behind the search form of `app\models\Accounts`.
 */
class AccountsSearch extends Accounts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aid', 'sold', 'uid','price','notes'], 'integer'],
            [['acctype', 'country', 'infos', 'sto', 'dateofsold', 'date', 'reported', 'sitename', 'source', 'a_username', 'a_password', 'proof_url', 'notes'], 'safe'],
            //[['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Accounts::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions -- custom
        $query->orFilterWhere([
            'aid' => $this->notes,
            'price' => $this->notes,
            'sold' => $this->notes,
            'date' => $this->notes,
            'uid' => $this->notes,
            'stat' => $this->notes,
        ]);

        $query->orFilterWhere(['like', 'acctype', $this->notes])
            ->orFilterWhere(['like', 'country', $this->notes])
            ->orFilterWhere(['like', 'infos', $this->notes])
            ->orFilterWhere(['like', 'sto', $this->notes])
            ->orFilterWhere(['like', 'dateofsold', $this->notes])
            ->orFilterWhere(['like', 'reported', $this->notes])
            ->orFilterWhere(['like', 'sitename', $this->notes])
            ->orFilterWhere(['like', 'source', $this->notes])
            ->orFilterWhere(['like', 'a_username', $this->notes])
            ->orFilterWhere(['like', 'a_password', $this->notes])
            ->orFilterWhere(['like', 'proof_url', $this->notes])
            ->orFilterWhere(['like', 'notes', $this->notes])
            ->orFilterWhere(['like', 'stat', $this->notes]);

        // grid filtering conditions -- orgin
        // $query->andFilterWhere([
        //     'aid' => $this->aid,
        //     'price' => $this->price,
        //     'sold' => $this->sold,
        //     'date' => $this->date,
        //     'uid' => $this->uid,
        //     'stat' => $this->stat,
        // ]);
        //
        // $query->andFilterWhere(['like', 'acctype', $this->acctype])
        //     ->andFilterWhere(['like', 'country', $this->country])
        //     ->orFilterWhere(['like', 'infos', $this->notes])
        //     ->andFilterWhere(['like', 'sto', $this->sto])
        //     ->andFilterWhere(['like', 'dateofsold', $this->dateofsold])
        //     ->andFilterWhere(['like', 'reported', $this->reported])
        //     ->andFilterWhere(['like', 'sitename', $this->sitename])
        //     ->andFilterWhere(['like', 'source', $this->source])
        //     ->andFilterWhere(['like', 'a_username', $this->a_username])
        //     ->andFilterWhere(['like', 'a_password', $this->a_password])
        //     ->andFilterWhere(['like', 'proof_url', $this->proof_url])
        //     ->orFilterWhere(['like', 'notes', $this->notes])
        //     ->andFilterWhere(['like', 'stat', $this->stat]);

        return $dataProvider;
    }
}
