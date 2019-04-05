using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class PlayerController : MonoBehaviour {

    public float m_PlayerSpeed;
    public float m_TurnSpeed = 180f;
    public GameObject m_TorchPrefab;
    public Vector3 m_TorchPosition;         //TorchのPlayerに対する相対位置
    public int m_TotalNumberOfTorch;        //使えるTorchの合計数
    [HideInInspector] public bool m_SetAll; //Torchを全部使い終わったらTrueにする値
    public Text m_Count;
    public Material m_ActiveSwitchMaterial;
    public Material m_NonActiveSwitchMaterial;
    public List<ItemData> m_ItemLogList;    //自分の設置したアイテムのログをとるリスト
    public int m_sequenceId;
    public float m_TimeFromStart;
    public GameObject m_GuideUI1;
    public GameObject m_GuideUI2;
    private bool m_firstTorch;

    private Rigidbody m_Rigidbody;
    private float m_MovementInputValue;
    private float m_TurnInputValue;
    private int m_CurrentNumberOfTorch;      //使ったTorchの数
    [SerializeField] private GameObject m_GameManager;
    [SerializeField] private SwitchManager m_SwitchManager;
    private GameManager m_GameManagerScript;

    private ItemDataModel m_ItemDataModel;

    private void Awake () {
        m_Rigidbody = GetComponent<Rigidbody>();
        m_GameManagerScript = m_GameManager.GetComponent<GameManager>();
	}

    private void Start()
    {
        m_CurrentNumberOfTorch = 0;
        m_SetAll = false;
        m_Count.text = m_TotalNumberOfTorch.ToString();

        m_TimeFromStart = 0f;

        m_ItemLogList = new List<ItemData>(); 
        //sequenceIdはprefsから取得した数字に１足す
        m_sequenceId = PlayerPrefs.GetInt("sequenceId", 0) + 1;

        m_Count.gameObject.SetActive(false);
        m_GuideUI2.SetActive(false);
        m_GuideUI1.SetActive(true);
        m_firstTorch = true;
    }


    private void Update () {
        m_MovementInputValue = Input.GetAxis("Vertical");
        m_TurnInputValue = Input.GetAxis("Horizontal");

        m_TimeFromStart += Time.deltaTime;

        if (Input.GetButtonDown("SettingTorch") && !m_SetAll)
        {
            if (m_firstTorch)
            {
                StartCoroutine(setGuideUI());
                m_firstTorch = false;
            }
            SetTorch();
            AddLog(m_ItemLogList, 1);
            m_CurrentNumberOfTorch += 1;
            m_Count.text = (m_TotalNumberOfTorch - m_CurrentNumberOfTorch).ToString();

            if(m_CurrentNumberOfTorch == m_TotalNumberOfTorch)
            {
                Debug.Log("使い切りました");
                AddLog(m_ItemLogList, 2);

                //PlayerPrefsに登録
                SaveToPlayerPrefs();

                m_GameManagerScript.GameOver();
            }
        }
	}

    private void FixedUpdate()
    {
        Move();
        Turn();
    }

    private void Move()
    {
        Vector3 movement = transform.forward * m_MovementInputValue * m_PlayerSpeed * Time.deltaTime;

        m_Rigidbody.MovePosition(m_Rigidbody.position + movement);
    }

    private void Turn()
    {
        float turn = m_TurnInputValue * m_TurnSpeed * Time.deltaTime;

        Quaternion turnRotation = Quaternion.Euler(0f, turn, 0f);

        m_Rigidbody.MoveRotation(m_Rigidbody.rotation * turnRotation);
    }

    private IEnumerator setGuideUI()
    {
        m_Count.gameObject.SetActive(true);
        m_GuideUI1.SetActive(false);
        m_GuideUI2.SetActive(true);

        yield return new WaitForSeconds(3f);

        m_GuideUI2.SetActive(false);
    }

    private void SetTorch()
    {
        Instantiate(m_TorchPrefab, transform.position + m_TorchPosition, transform.rotation);
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.gameObject.tag == "Exit")
        {
            if(other.GetComponent<ExitDoor>().m_DoorNumber == 1)
            {
                AddLog(m_ItemLogList, 3);
            }
            else
            {
                AddLog(m_ItemLogList, 4);
            }

            //PlayerPrefsに登録
            SaveToPlayerPrefs();

            m_GameManagerScript.GameClear();
        }

        if(other.gameObject.tag == "Switch")
        {
            Debug.Log("スイッチに触れました");
            StartCoroutine(other.GetComponent<SwitchController>().PlayGhost());

            //ItemDataManager sItemDataManager = m_GameManager.GetComponent<ItemDataManager>();
            //sItemDataManager.setItems(sItemDataManager.m_ItemList);

            //スイッチに紐づけられたTorchをまとめてアクティブに
            //GameObject sTorches = other.transform.GetChild(0).gameObject;
            //sTorches.SetActive(true);

            //colliderをオフにして
            other.GetComponent<MeshCollider>().enabled = false;
            //アクティブ時のMaterialに変更
            other.GetComponent<Renderer>().material = m_ActiveSwitchMaterial;
        }
    }

    //アイテムを指定したアイテムリストに格納する関数
    public void AddLog(List<ItemData> itemDataList, int itemtype)
    {
        ItemData sitemData = new ItemData();
        sitemData.itemType = itemtype;
        sitemData.sequenceId = m_sequenceId; 
        sitemData.stageId = 1;                  //とりあえずtestステージを指定
        sitemData.time = m_TimeFromStart;

        sitemData.itemXCoordinate = transform.position.x + m_TorchPosition.x;
        sitemData.itemYCoordinate = 0f;
        sitemData.itemZCoordinate = transform.position.z + m_TorchPosition.z;
        itemDataList.Add(sitemData);
    }

    //各シークエンス終了時にシリアライズとPlayerPrefsへの格納を行う関数
    public void SaveToPlayerPrefs() { 
        PlayerPrefs.SetInt("sequenceId", m_sequenceId);

        ItemDataModel itemDataModel = new ItemDataModel();
        string prefsDic = itemDataModel.SerializeToJson(m_ItemLogList);

        PlayerPrefs.SetString("seq" + m_sequenceId.ToString(), prefsDic);

        Debug.Log(PlayerPrefs.GetString("seq" + m_sequenceId.ToString()));
    }
}
